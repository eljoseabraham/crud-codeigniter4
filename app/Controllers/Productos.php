<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Producto;


class Productos extends Controller{
 public function index(){

    $producto= new Producto();
    $datos['productos']= $producto->orderBy('id','ASC')->findAll();

    $datos['cabecera'] = view('template/cabecera');
    $datos['pie'] = view('template/pie');

    return view('productos/productos',$datos);
 }

 public function crear(){
    $datos['cabecera'] = view('template/cabecera');
    $datos['pie'] = view('template/pie');
    return view('productos/crear', $datos);
    
 }

 public function guardar(){
    //Tomar el valor de:
   $producto= new Producto();

   //Validacion para cambiar la imagen
   $validacion = $this->validate([
    'marca'=>'required|min_length[3]',
    'producto'=>'required|min_length[3]',
    'modelo'=>'required|min_length[3]',
    'noserie'=>'required|min_length[3]',
    'imagen'=>[
        'uploaded[imagen]',
        'mime_in[imagen,image/jpg,image/jpeg,image/png]',
        'max_size[imagen,1024]',
    ]
]);


if(!$validacion){
    $session=session();
    $session->setFlashdata('mensaje','Revise la informacion');
   return redirect()->back()->withInput();
    //return $this->response->redirect(site_url('/productos'));

}


    //Verificar si la imagen existe
   if($imagen=$this->request->getFile('imagen')){
    //Ya que hay informacion le damos un nombre random para que guarde sin error   
    $newname= $imagen ->getRandomName();
    $imagen->move('../public/uploads/',$newname);
    
    $datos=[
        'marca'=>$this->request->getVar('marca'),
        'producto'=>$this->request->getVar('producto'),
        'modelo'=>$this->request->getVar('modelo'),
        'noserie'=>$this->request->getVar('noserie'),
        'imagen'=> $newname
    ];
    $producto->insert($datos);
   }
   return $this->response->redirect(site_url('/productos'));



 }
//El borrar recibe el id por default es nulo por si no recive nada
 public function borrar($id=null){
    
    $producto = new Producto();
    //Buscar informacion que conincida con id
    $datosProducto = $producto->where('id',$id)->first();
    $ruta=('../public/uploads/'.$datosProducto['imagen']);
    //funcion de php para borrar el archivo
    unlink($ruta);
    //Borrado en BD mediante el id que se envio
    $producto->where('id',$id)->delete($id);
    //Redireccionado al listado
    return $this->response->redirect(site_url('/productos'));
 }

 public function editar($id=null){
     print_r($id);
     $producto = new Producto();
     //Buscar que el objeto coinsida con el id
     $datos['producto']=$producto->where('id',$id)->first();

     $datos['cabecera'] = view('template/cabecera');
     $datos['pie'] = view('template/pie');
     return view('productos/editar', $datos);
     

 }

 public function actualizar(){
     $producto = new Producto();

     $datos=[
        'marca'=>$this->request->getVar('marca'),
        'producto'=>$this->request->getVar('producto'),
        'modelo'=>$this->request->getVar('modelo'),
        'noserie'=>$this->request->getVar('noserie')
    ];
    $id= $this->request->getVar('id');


    $validacion = $this->validate([
        'marca'=>'required|min_length[3]',
        'producto'=>'required|min_length[3]',
        'modelo'=>'required|min_length[3]',
        'noserie'=>'required|min_length[3]'
    ]);
    
    
    if(!$validacion){
        $session=session();
        $session->setFlashdata('mensaje','Revise la informacion');
       return redirect()->back()->withInput();
        //return $this->response->redirect(site_url('/productos'));
    
    }
    
    $producto->update($id,$datos);

    //Validacion para cambiar la imagen
    $validacion = $this->validate([
        'imagen'=>[
            'uploaded[imagen]',
            'mime_in[imagen,image/jpg,image/jpeg,image/png]',
            'max_size[imagen,1024]',
        ]
    ]);

    if($validacion){
    //Verificar si la imagen existe
   if($imagen=$this->request->getFile('imagen')){

    $datosProducto=$producto->where('id',$id)->first();
    $ruta=('../public/uploads/'.$datosProducto['imagen']);
    unlink($ruta);
    //Ya que hay informacion le damos un nombre random para que guarde sin error   
    $newname= $imagen ->getRandomName();
    $imagen->move('../public/uploads/',$newname);
    
    $datos=['imagen'=> $newname];
    $producto->update($id,$datos);
   }
    }
    
    return $this->response->redirect(site_url('/productos'));

 }

}
//ejemplo para git