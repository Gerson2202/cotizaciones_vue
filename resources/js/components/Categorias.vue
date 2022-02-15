
<template>
    <div class="container">
        <div class="row justify-content-center">

             <!-- Modal PARA CREAR CATEGORIA -->
          <div   class="modal fade" id="modalAggCategoria" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content" >
                <div class="modal-header">
                  <h5 class="modal-title"  id="exampleModalLabel">Agregar Categoria</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                   <form action="">
                           <div class="my-4">
                                <label for="nombre">Nombre</label>
                                <!-- enlazar un input con una data  -->
                                <input v-model="categoria.nombre"  type="text" class="form-control" id="nombre" name="nombre" placeholder="escribir Nombre">
                           </div>

                       </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button @click="guardarCategoria()" type="submit" data-dismiss="modal" class="btn btn-primary">Agregar Categoria</button>
                </div>
              </div>
            </div>
          </div>
             <!-- Modal PARA EDITAR CATEGORIA -->
          <div   class="modal fade" id="modalEditCategoria" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content" >
                <div class="modal-header">
                  <h5 class="modal-title"  id="exampleModalLabel">Editar Categoria</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                   <form action="">
                           <div class="my-4">
                                <label for="nombre">Nombre</label>
                                <!-- enlazar un input con una data  -->
                                <input v-model="Editcategoria.nombre"  type="text" class="form-control" id="nombre" name="nombre" placeholder="escribir Nombre">
                           </div>

                       </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button @click="modificarCategoria()" type="submit" data-dismiss="modal" class="btn btn-primary">Agregar Categoria</button>
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
                  <th row="2">
                   <button type="button"   class="btn btn-success btn-round btn-sm" data-toggle="modal" data-target="#modalAggCategoria"><i class="material-icons">add_box</i>  Agregar</button>
                  </th>                 
                  
                 
                </thead>
                <tbody>
                   <tr v-for="cat in categorias" :key="cat.id">
                        <th scope="row">{{cat.id}}</th>
                        <td>{{cat.nombre}}</td>
                        <td><button @click="consultarCategoria(cat)" data-toggle="modal" data-target="#modalEditCategoria" class="btn btn-info btn-sm">Editar</button>
                        <button @click="eliminar(cat.id)" class="btn btn-danger btn-sm">Eliminar</button></td>
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
           
           idCategoria:0,
        //    tabla
           categorias:[],
        //    Agregar
           categoria:{
               nombre:'',
           },
        //    Editar
           Editcategoria:{
               nombre:'',
           }
           

        }
        
    },
     methods:{

      //  LISTAR CLIENTES
         async listar()
         {
             const res=await axios.get('categorias/list');
             this.categorias=res.data;
         },  
          async eliminar(id)
         {
             const res=await axios.delete('categorias/'+id);
             this.listar();
             this.notificacioError();
         },  

          //  GUARDAR PRODUCTO
         async guardarCategoria(){
            const res=await axios.post('categoria/store',this.categoria)
            // RESPUESTA POSITIVA
            .then(response => {
                  this.categoria.nombre="",
                  this.listar();
                  this.notificacionExitosa();
              })
               // RESPUESTA NEGATIVA
              .catch(err => {
                alert('favor completar los campos')
              })
         },
         async consultarCategoria(data)
         {
            this.Editcategoria.nombre=data.nombre,
            this.idCategoria=data.id
         },
         async modificarCategoria()
         {
             const res=await axios.put('categoria/'+this.idCategoria,this.Editcategoria)

               .then(response => {
                 this.notificacionExitosa();
                  this.listar();
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
