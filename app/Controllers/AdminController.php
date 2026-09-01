<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Admin;
use App\Models\Product;

final class AdminController
{
    public function __construct(private Admin $admins, private Product $products) {}

    public function handle(): void
    {
        if (isset($_GET['logout'])) { unset($_SESSION['admin']); $this->redirect(); }
        if (!isset($_SESSION['admin'])) { if ($_SERVER['REQUEST_METHOD'] === 'POST') $this->login(); $error=$_SESSION['login_error']??null; unset($_SESSION['login_error']); require __DIR__.'/../views/admin-login.php'; return; }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { $this->verifyCsrf(); $this->handleAction((string)($_POST['action']??'')); }
        $categories=$this->products->categories(); $products=$this->products->adminAll(); $message=$_SESSION['admin_message']??null; unset($_SESSION['admin_message']); $csrf=$this->csrf();
        $editing = isset($_GET['edit']) ? $this->products->findAdmin((int)$_GET['edit']) : null;
        require __DIR__.'/../views/admin-dashboard.php';
    }

    private function login(): void { $admin=$this->admins->findByUsername(trim((string)($_POST['username']??''))); if(!$admin || !password_verify((string)($_POST['password']??''),$admin['password_hash'])) { $_SESSION['login_error']='Usuario o contraseña incorrectos.'; $this->redirect(); } session_regenerate_id(true); $_SESSION['admin']=['id'=>$admin['id'],'username'=>$admin['username']]; $this->redirect(); }
    private function handleAction(string $action): void { if($action==='create') $this->create(); elseif($action==='update') $this->update(); elseif($action==='add_images') $this->addImages(); elseif($action==='delete_image') $this->deleteImage(); elseif($action==='delete') $this->delete(); }
    private function fields(): array { $category=filter_var($_POST['category_id']??null,FILTER_VALIDATE_INT); $name=trim((string)($_POST['name']??'')); $description=trim((string)($_POST['description']??'')); $price=filter_var($_POST['price']??null,FILTER_VALIDATE_FLOAT); if(!$category || !$name || !$description || $price===false || $price<=0) throw new \RuntimeException('Completa todos los datos y usa un precio válido.'); return [(int)$category,$name,$description,(float)$price]; }
    private function create(): void { try { [$category,$name,$description,$price]=$this->fields(); $images=$this->uploads($_FILES['images']??[]); if(!$images) throw new \RuntimeException('Agrega al menos una imagen.'); $this->products->create($category,$name,$description,$price,$images); $_SESSION['admin_message']='Producto publicado correctamente.'; } catch(\RuntimeException $e) { $_SESSION['admin_message']=$e->getMessage(); } $this->redirect(); }
    private function update(): void { try { $id=filter_var($_POST['product_id']??null,FILTER_VALIDATE_INT); if(!$id) throw new \RuntimeException('Producto no válido.'); [$category,$name,$description,$price]=$this->fields(); $this->products->update((int)$id,$category,$name,$description,$price); $_SESSION['admin_message']='Información actualizada.'; } catch(\RuntimeException $e) { $_SESSION['admin_message']=$e->getMessage(); } $this->redirect(); }
    private function addImages(): void { try { $id=filter_var($_POST['product_id']??null,FILTER_VALIDATE_INT); $images=$this->uploads($_FILES['images']??[]); if(!$id || !$images) throw new \RuntimeException('Selecciona al menos una imagen.'); $this->products->addImages((int)$id,$images); $_SESSION['admin_message']='Nuevas perspectivas agregadas.'; } catch(\RuntimeException $e) { $_SESSION['admin_message']=$e->getMessage(); } $this->redirect((int)($_POST['product_id']??0)); }
    private function deleteImage(): void { $image=filter_var($_POST['image_id']??null,FILTER_VALIDATE_INT); $product=filter_var($_POST['product_id']??null,FILTER_VALIDATE_INT); if($image) { $this->products->deleteImage((int)$image); $_SESSION['admin_message']='Imagen eliminada.'; } $this->redirect((int)$product); }
    private function delete(): void { $id=filter_var($_POST['product_id']??null,FILTER_VALIDATE_INT); if($id) { $this->products->delete((int)$id); $_SESSION['admin_message']='Producto eliminado.'; } $this->redirect(); }

    private function uploads(array $files): array
    {
        $results=[]; $names=$files['name']??[]; if(!is_array($names)) $files=['name'=>[$files['name']??''],'tmp_name'=>[$files['tmp_name']??''],'error'=>[$files['error']??UPLOAD_ERR_NO_FILE],'size'=>[$files['size']??0]];
        foreach($files['name'] as $i=>$unused) { if(($files['error'][$i]??UPLOAD_ERR_NO_FILE)===UPLOAD_ERR_NO_FILE) continue; $results[]=$this->upload(['tmp_name'=>$files['tmp_name'][$i]??'','error'=>$files['error'][$i]??UPLOAD_ERR_NO_FILE,'size'=>$files['size'][$i]??0]); }
        return $results;
    }
    private function upload(array $file): string { if(($file['error']??UPLOAD_ERR_NO_FILE)!==UPLOAD_ERR_OK) throw new \RuntimeException('No se pudo cargar una de las imágenes.'); if(($file['size']??0)>5242880) throw new \RuntimeException('Cada imagen debe pesar menos de 5 MB.'); $mime=(new \finfo(FILEINFO_MIME_TYPE))->file($file['tmp_name']); $types=['image/jpeg'=>'jpg','image/png'=>'png','image/webp'=>'webp']; if(!isset($types[$mime])) throw new \RuntimeException('Solo se permiten JPG, PNG o WEBP.'); $folder=dirname(__DIR__,2).'/uploads/products'; if(!is_dir($folder)&&!mkdir($folder,0755,true)) throw new \RuntimeException('No se pudo preparar la carpeta de imágenes.'); $filename=bin2hex(random_bytes(16)).'.'.$types[$mime]; if(!move_uploaded_file($file['tmp_name'],$folder.'/'.$filename)) throw new \RuntimeException('No se pudo guardar una imagen.'); return 'uploads/products/'.$filename; }
    private function csrf(): string { $_SESSION['csrf']??=bin2hex(random_bytes(32)); return $_SESSION['csrf']; }
    private function verifyCsrf(): void { if(!hash_equals($this->csrf(),(string)($_POST['csrf']??''))) { http_response_code(403); exit('Solicitud no válida.'); } }
    private function redirect(int $edit=0): never { header('Location: admin.php'.($edit?'?edit='.$edit:'')); exit; }
}
