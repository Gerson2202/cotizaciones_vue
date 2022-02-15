
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
                                <input v-model="cliente.nombre" required  type="text" class="form-control" id="nombre" name="nombre" placeholder="escribir Nombre">
                           </div>
                            <div class="my-4">
                                <label for="descripcion">Descripcion</label>
                                <textarea v-model="cliente.descripcion" type="text" class="form-control" id="descripcion" name="descripcion" placeholder="escribir descripcion"></textarea>
                           </div> 
                          
                            <div class="my-4">
                                <label for="Tiempo">Tiempo Camioneta</label>
                                <textarea v-model="cliente.tiempo_camioneta" type="text" class="form-control" id="descripcion" name="tiempo_camioe" placeholder="escribir descripcion"></textarea>
                           </div>                         
                          

                       </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button @click="guardarCliente()" type="submit" data-dismiss="modal" class="btn btn-primary">Agregar Cliente</button>
                </div>
              </div>
            </div>
          </div>
             <!-- Modal PARA EDITAR COTIZACION -->
          <div   class="modal fade" id="modalEditar" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <input v-model="clienteEdit.nombre" required  type="text" class="form-control" id="nombre" name="nombre" placeholder="escribir Nombre">
                           </div>
                            <div class="my-4">
                                <label for="descripcion">Descripcion</label>
                                <textarea v-model="clienteEdit.descripcion" type="text" class="form-control" id="descripcion" name="descripcion" placeholder="escribir descripcion"></textarea>
                           </div> 
                          
                            <div class="my-4">
                                <label for="Tiempo">Tiempo Camioneta</label>
                                <textarea v-model="clienteEdit.tiempo_camioneta" type="text" class="form-control" id="descripcion" name="tiempo_camioe" placeholder="escribir descripcion"></textarea>
                           </div>                         
                          

                       </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button @click="modificarCliente()" type="submit" data-dismiss="modal" class="btn btn-primary">Agregar Cliente</button>
                </div>
              </div>
            </div>
          </div>

          <!-- TABLA -->
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
                    Descripcion
                  </th>
                  <th>
                    Tiempo De camioneta
                  </th>
                  <th colspan="2" style="ali">
                    <button type="button"   class="btn btn-success btn-round btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="material-icons">add_box</i>  Agregar</button>
                  </th>
                 
                </thead>
                <tbody>
                   <tr v-for="art in clientes" :key="art.id">
                        <th scope="row">{{art.id}}</th>
                        <td>{{art.nombre}}</td>
                        <td>{{art.descripcion}}</td>
                        <td>{{art.tiempo_camioneta}}</td>
                        <td><button @click="modalEditar(art)" data-toggle="modal" data-target="#modalEditar" class="btn btn-info btn-sm">Editar</button></td>
                        <td><button @click="eliminar(art.id)" class="btn btn-danger btn-sm">Eliminar</button></td>
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
           
            clientes:[],
            idCliente:0,
            cliente:{
              nombre:'',
              descripcion:'',
              tiempo_camioneta:''
            },
             clienteEdit:{
              nombre:'',
              descripcion:'',
              tiempo_camioneta:''
            },
           
           

        }
        
    },
     methods:{

      //  LISTAR CLIENTES
         async listar()
         {
             const res=await axios.get('clientes/list');
             this.clientes=res.data;
         }, 
          async eliminar(id)
         {
             const res=await axios.delete('clientes/'+id);
             this.listar();
             this.notificacioError();
         },  
         async guardarCliente()
         {
           const res=await axios.post('cliente/store',this.cliente)
            // RESPUESTA POSITIVA
            .then(response => {
                  this.cliente.nombre="",
                  this.cliente.descripcion="",
                  this.cliente.tiempo_camioneta="",
                  this.listar();             
                  this.notificacionExitosa()                     
              })
               // RESPUESTA NEGATIVA
              .catch(err => {
                alert('favor completar los campos')     
              }) 
         },
          async modalEditar(data)
          {
              this.clienteEdit.nombre=data.nombre,
              this.clienteEdit.descripcion=data.descripcion,
              this.clienteEdit.tiempo_camioneta=data.tiempo_camioneta,
              this.idCliente=data.id
              
          },
            async modificarCliente()
          {
              const res=await axios.put('cliente/'+this.idCliente,this.clienteEdit)

               .then(response => {
                  this.listar();
                  this.notificacionExitosa()
              })
               // RESPUESTA NEGATIVA
              .catch(err => {
                alert('favor completar los campos')     
              })  
             
          },
          // Notificacion exitosa
          async notificacionExitosa(from, align){

            $.notify({
                icon: "add_alert",
                message: "Datos Guardados con exito"

            },{
                type: 'success',
                timer: 1000,
                placement: {
                    from: from,
                    align: align
                }
            });
          },
            // Notificacion de eliminacion
          async notificacioError(from, align){

            $.notify({
                icon: "add_alert",
                message: "Se elemino correctamente"

            },{
                type: 'danger',
                timer: 1000,
                placement: {
                    from: from,
                    align: align
                }
            });
          },
        
        
       
    },

    // paa que se se inicie la funcion listar
    created(){
        this.listar();
    },
    }
</script>
