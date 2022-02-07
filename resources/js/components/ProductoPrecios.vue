
<template>
    <div class="container">
         <div class="row">
             <!-- INFO PRODUCTO -->
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">Detalle  :</span>
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active" href="#profile" data-toggle="tab">
                            <i class="material-icons">bug_report</i> Info
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#messages" data-toggle="tab">
                            <i class="material-icons">code</i> Imagen
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#settings" data-toggle="tab">
                            <i class="material-icons">cloud</i> Precios
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <!-- INFO -->
                    <div class="tab-pane active" id="profile">
                      <table class="table">
                        <tbody>
                          <tr>
                            <td class="text-primary"><strong>Nombre</strong> </td>
                            <td>{{producto.nombre}}</td> 
                          </tr>
                          <tr>
                            <td class="text-primary"><strong>Descripcion</strong></td>
                            <td>{{producto.descripcion}}</td> 
                          </tr>
                          <tr>
                            <td class="text-primary"><strong>Categoria</strong> </td>
                            <td>{{productocat.nombre}}</td> 
                          </tr>
                         
                        </tbody>
                      </table>
                    </div>
                    <!-- IMAGEN -->
                   <div class="tab-pane" id="messages">
                      <form action="" enctype="multipart/form-data">
                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                            <div class="fileinput-new thumbnail img-raised">
                                <img src="http://style.anu.edu.au/_anu/4/images/placeholders/person_8x10.png" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                            <div>
                                <input v-model="imgProducto.id" placeholder="hl" name="id" type="hidden">

                                <span  class="btn btn-raised btn-round btn-default btn-file">
                                    <span class="fileinput-new">Seleccionar</span>
                                    <span class="fileinput-exists"></span>
                                    <input @change="obtenerImagen" type="file" name="img" />
                                </span>
                                <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Eliminar</a>
                                <button type="button" @click="guardarImagen()" class="btn btn-success btn-round fileinput-exists" >Guardar</button>
                            </div>
                        </div>
                      </form>
                    </div>
                    <!-- PRECIOS -->
                    <div class="tab-pane" id="settings">
                      <table class="table">
                        <tbody>
                          <tr >
                            <td>
                            <td class="text-info"><strong>Proveedor</strong> </td>                            

                            </td>
                            <td class="text-info"><strong>Precio</strong> </td> 
                            <td class="text-info"><strong>Opciones</strong> </td>                          
                                                    
                          </tr>
                          <tr v-for="precio in precioso">
                              <td>
                                <td class="text-primary"><strong>{{precio.proveedor.nombre}}</strong></td>
                              </td>
                              <td>{{precio.precio}}</td>
                              <td class="td-actions text-right">
                                
                                <button @click="eliminarPrecio(precio.id)" type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm">
                                  <i class="material-icons">close</i>
                                </button>
                              </td>
                          </tr>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- ENVIAR -->
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Agregar Precios</h4>
                  <p class="card-category">Cada proveedor maneja sus propios precios</p> 
                  
                </div>
                <div class="card-body table-responsive">
                    <form>
                        <div class="form-group">
                            <label for="proveedor">Proveedor</label>
                            <select v-model="prodcutoPrecio.proveedor_id"  id="proveedor_id" name="proveedor_id" class="form-control">
                                   <option  value="0">Seleccionar proveedor...</option>
                                    <option v-for="prov in proveedores" :value="prov.id"> {{prov.nombre}}</option>  
                                                                    
                                   
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio/IVA incluido</label>
                            <input v-model="prodcutoPrecio.precio" type="number" min="0" class="form-control" name="precio" id="precio" placeholder="$">
                        </div>
                        <div class="form-group" >
                            <input  v-model="prodcutoPrecio.producto_id" type="hidden" class="form-control" name="producto_id" id="producto_id" placeholder="$">
                        </div>
                        <button @click="agregarPrecio()" type="button"  class="btn btn-primary">Agregar</button>
                    </form>
                </div>
              </div>
              
            </div>
          </div>
    </div>
</template>

<script>
    export default {
        props: ["proveedores","producto","productocat","precios"],
        mounted() {
            console.log('Component mounted.')
        },

       data(){
        return{
          
            idproducto:this.producto.id,
            idRegistroprecio:0,
            
            precioso:[],
            imgProducto:{
              img:'',
              id:this.producto.id,
            },


            prodcutoPrecio:{
                producto_id:this.producto.id,
                proveedor_id:'',
                precio:'',
                
            }     
            
                     

        }
        
    },
     methods:{
         async agregarPrecio()
         {

            //  REVISAR NO ME ESTA LEYENDO LA RUTA SE SOLUCIONE CAMBIANDO EL NONBRE
             const res=await axios.post('/store',this.prodcutoPrecio)
            // RESPUESTA POSITIVA
            .then(response => {
              console.log(res);
                 this.prodcutoPrecio.proveedor_id="",
                 this.prodcutoPrecio.precio=""  
                 this.listarPrecios()
              })
               // RESPUESTA NEGATIVA
              .catch(err => {
                alert('favor completar los campos')     
              }) 
         },
         async eliminarPrecio(data)
         {
            const res=await axios.delete('/delet/precio/'+data)
            // RESPUESTA POSITIVA
            .then(response => {
               alert('eliminado con exito')
               this.listarPrecios()
              //  
              })
               // RESPUESTA NEGATIVA
              .catch(err => {
                alert('favor completar los campos')     
              }) 
         },
          async listarPrecios()
         {
            const res=await axios.get('/list/precio/'+this.idproducto);
             this.precioso=res.data
             
         },
         async obtenerImagen(e)
         {
           let file= e.target.files[0];
           
           this.imgProducto.img=file;
         },
         async guardarImagen()
         {
            
             const res=await axios.put('/imagen/store/'+this.producto.id,this.imgProducto);
             console.log(res);
         },
         //listar productos con precios
         async listar()
         {
           
         }

      
        
        
       
    },

    // paa que se se inicie la funcion listar
    created(){
      this.listarPrecios()
        
    },
    }
</script>
