
<template>
    <div class="container">
        <div class="row justify-content-center">

          <!-- Modal PARA CREAR COTIZACION -->
          <div   class="modal fade" id="exampleModal" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content" >
                <div class="modal-header">
                  <h5 class="modal-title"  id="exampleModalLabel">Agregar Cliente</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                   <form action="">
                           <div class="my-4">
                                <label for="nombre">Nombre</label>
                                <!-- enlazar un input con una data  -->
                                <input v-model="proveedor.nombre" required  type="text" class="form-control" id="nombre" name="nombre" placeholder="escribir Nombre">
                           </div>
                            <div class="my-4">
                                <label for="descripcion">Descripcion</label>
                                <textarea v-model="proveedor.descripcion" type="text" class="form-control" id="descripcion" name="descripcion" placeholder="escribir descripcion"></textarea>
                           </div> 
                          
                            <div class="my-4">
                                <label for="Tiempo">Direccion</label>
                                <textarea v-model="proveedor.direccion" type="text" class="form-control" id="direccion" name="direccion" placeholder="escribir direccion"></textarea>
                           </div>          
                           <div class="my-4">
                                <label for="Tiempo">Tiempo Envio</label>
                                <textarea v-model="proveedor.tiempo_envio" type="text" class="form-control" id="tiempo_envio" name="tiempo_envio" placeholder="Tiempo"></textarea>
                           </div>                
                          

                       </form>
                </div>
                <div class="modal-footer">
                  <button  type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button @click="guardarProveedor()" type="submit" data-dismiss="modal" class="btn btn-primary">Agregar Cliente</button>
                </div>
              </div>
            </div>
          </div>

             <!-- Modal PARA CREAR COTIZACION -->
          <div   class="modal fade" id="modalEdit" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content" >
                <div class="modal-header">
                  <h5 class="modal-title"  id="exampleModalLabel">Modificar Cliente</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                   <form action="">
                           <div class="my-4">
                                <label for="nombre">Nombre</label>
                                <!-- enlazar un input con una data  -->
                                <input v-model="proveedorEdit.nombre" required  type="text" class="form-control" id="nombre" name="nombre" placeholder="escribir Nombre">
                           </div>
                            <div class="my-4">
                                <label for="descripcion">Descripcion</label>
                                <textarea v-model="proveedorEdit.descripcion" type="text" class="form-control" id="descripcion" name="descripcion" placeholder="escribir descripcion"></textarea>
                           </div> 
                          
                            <div class="my-4">
                                <label for="Tiempo">Direccion</label>
                                <textarea v-model="proveedorEdit.direccion" type="text" class="form-control" id="direccion" name="direccion" placeholder="escribir direccion"></textarea>
                           </div>          
                           <div class="my-4">
                                <label for="Tiempo">Tiempo Envio</label>
                                <textarea v-model="proveedorEdit.tiempo_envio" type="text" class="form-control" id="tiempo_envio" name="tiempo_envio" placeholder="Tiempo"></textarea>
                           </div>                
                          

                       </form>
                </div>
                <div class="modal-footer">
                  <button  type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button @click="modificarProveedor()" type="submit" data-dismiss="modal" class="btn btn-primary">Modificar Proveedor</button>
                </div>
              </div>
            </div>
          </div>
          <!-- TABLA  -->
           <div class="table-responsive">
              <table class="table">
                <thead class="text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Nombre
                  </th>
                   <th>
                    Descripion
                  </th>
                   <th>
                    Direccion
                  </th>
                  <th>
                    T.envio
                  </th>
                  <th colspan="2" style="ali">
                    <button type="button"   class="btn btn-success btn-round btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="material-icons">add_box</i>  Agregar</button>
                  </th>
                 
                </thead>
                <tbody>
                   <tr v-for="prov in proveedores" :key="prov.id">
                        <th scope="row">{{prov.id}}</th>
                        <td>{{prov.nombre}}</td>
                        <td>{{prov.descripcion}}</td>
                        <td>{{prov.direccion}}</td>
                        <td>{{prov.tiempo_envio}}</td>
                        <td><button @click="modalEditar(prov)" data-toggle="modal" data-target="#modalEdit" class="btn btn-info btn-sm">Editar</button>
                        <button @click="eliminar(prov.id)" class="btn btn-danger btn-sm">Eliminar</button></td>
                    </tr>                    
                 
                </tbody>
              </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

       data(){
        return{
           
            proveedores:[],
            idProveedor:0,
            proveedor:{
              nombre:'',
              descripcion:'',
              direccion:'',
              tiempo_envio:''
            },
             proveedorEdit:{
              nombre:'',
              descripcion:'',
              direccion:'',
              tiempo_envio:''
            }
           
           

        }
        
    },
     methods:{

      //  LISTAR CLIENTES
         async listar()
         {
             const res=await axios.get('proveedores/list');
             this.proveedores=res.data;
         },  

           async eliminar(id)
         {
             const res=await axios.delete('proveedores/'+id);
             this.listar();
         },
         async guardarProveedor()
         {
           const res=await axios.post('proveedor/store',this.proveedor)
            // RESPUESTA POSITIVA
            .then(response => {
                  this.proveedor.nombre="",
                  this.proveedor.descripcion="",
                  this.proveedor.direccion="",
                  this.proveedor.tiempo_envio="",
                  this.listar();                                  
              })
               // RESPUESTA NEGATIVA
              .catch(err => {
                alert('favor completar los campos')     
              })
         },
         async modalEditar(data)
         {
                this.proveedorEdit.nombre=data.nombre,
                this.proveedorEdit.descripcion=data.descripcion,
                this.proveedorEdit.direccion=data.direccion,
                this.proveedorEdit.tiempo_envio=data.tiempo_envio,
                this.idProveedor=data.id
         },
         async modificarProveedor()
         {
            const res=await axios.put('proveedor/'+this.idProveedor,this.proveedorEdit)

               .then(response => {
                  this.listar();
              })
               // RESPUESTA NEGATIVA
              .catch(err => {
                alert('favor completar los campos')     
              }) 
         }
        
        
       
    },

    // paa que se se inicie la funcion listar
    created(){
        this.listar();
    },
    }
</script>
