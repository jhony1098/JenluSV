<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Product;
use App\Models\Review;

final class ApiController
{
    public function __construct(private Product $products, private Review $reviews) {}

    public function products(): void { $category=preg_replace('/[^a-z-]/','',$_GET['category']??'all')?:'all'; $this->respond(['products'=>$this->products->all($category)]); }

    public function cart(): void
    {
        $_SESSION['cart'] ??= [];
        if ($_SERVER['REQUEST_METHOD'] === 'GET') { $this->respond($this->cartData()); return; }
        $body=json_decode(file_get_contents('php://input'),true)?:[]; $operation=$body['operation']??'add'; $id=filter_var($body['productId']??null,FILTER_VALIDATE_INT);
        if (!$id) { $this->respond(['error'=>'Producto no válido'],422); return; }
        if ($operation === 'remove') { unset($_SESSION['cart'][$id]); $this->respond($this->cartData()); return; }
        if ($operation === 'update') { if(isset($_SESSION['cart'][$id])) { $quantity=max(0,(int)($body['quantity']??0)); if($quantity===0) unset($_SESSION['cart'][$id]); else $_SESSION['cart'][$id]['quantity']=$quantity; } $this->respond($this->cartData()); return; }
        $product=$this->products->find($id);
        if (!$product) { $this->respond(['error'=>'Producto no encontrado'],404); return; }
        if(isset($_SESSION['cart'][$id])) $_SESSION['cart'][$id]['quantity']++; else $_SESSION['cart'][$id]=['id'=>$product['id'],'name'=>$product['name'],'price'=>$product['price'],'quantity'=>1];
        $this->respond($this->cartData());
    }

    public function reviews(): void
    {
        $productId=filter_var($_GET['productId']??null,FILTER_VALIDATE_INT);
        if(!$productId || !$this->products->find($productId)) { $this->respond(['error'=>'Producto no encontrado'],404); return; }
        if($_SERVER['REQUEST_METHOD']==='GET') { $this->respond(['reviews'=>$this->reviews->all($productId)]); return; }
        $body=json_decode(file_get_contents('php://input'),true)?:[]; $name=trim((string)($body['name']??'')); $comment=trim((string)($body['comment']??'')); $rating=(int)($body['rating']??0);
        if($name==='' || $comment==='' || $rating<1 || $rating>5) { $this->respond(['error'=>'Completa tu nombre, comentario y calificación.'],422); return; }
        $this->reviews->create($productId,mb_substr($name,0,80),$rating,mb_substr($comment,0,500));
        $this->respond(['ok'=>true,'reviews'=>$this->reviews->all($productId)],201);
    }

    private function cartData(): array { $items=array_values($_SESSION['cart']); $count=array_sum(array_column($items,'quantity')); $total=0.0; foreach($items as $item) $total+=(float)$item['price']*(int)$item['quantity']; return ['items'=>$items,'count'=>$count,'total'=>$total]; }
    private function respond(array $data,int $status=200): void { http_response_code($status); header('Content-Type: application/json; charset=utf-8'); echo json_encode($data,JSON_UNESCAPED_UNICODE); }
}
