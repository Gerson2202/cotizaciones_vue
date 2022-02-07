
<template>
    <div class="container">
    
        <div class="row justify-content-center">


          <!-- Modal PARA CREAR COTIZACION -->
          <div  :class="{mostrar:modal}" class="modal fade" id="exampleModal" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content" >
                <div class="modal-header">
                  <h5 class="modal-title"  id="exampleModalLabel">Agregar Cotizacion</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                   <form action="">
                           <div class="my-4">
                                <label for="nombre">Nombre</label>
                                <!-- enlazar un input con una data  -->
                                <input required v-model="cotizacion.nombre" type="text" class="form-control" id="nombre" name="nombre" placeholder="escribir Nombre">
                           </div>
                           <div class="my-4">
                                <label for="cliente">Cliente</label>
                                  <select v-model="cotizacion.cliente_id" :options="clientes" name="clientes" class="form-control">
                                   <option disabled value="0">Seleccionar uno...</option>
                                    <option v-for="client in clientes" :value="client.id"> {{client.nombre}}</option>                                  
                                   
                                </select>
                           </div> 
                            <div class="my-4">
                                <label for="descripcion">Descripcion</label>
                                <textarea v-model="cotizacion.descripcion" type="text" class="form-control" id="descripcion" name="descripcion" placeholder="escribir descripcion"></textarea>
                           </div>
                            <div class="my-4">
                                <label for="stock">codigo</label>
                                <input v-model="cotizacion.codigo"  type="number" min="0" class="form-control" id="codigo" name="codigo" placeholder="escribir codigo">
                           </div>  
                           <div class="my-4">
                                <label for="stock">Estado</label>
                                 <select v-model="cotizacion.estado" id="inputState" class="form-control" name="estado">
                                  <option selected>Estado de cotizacion...</option>
                                  <option value="Iniciado">Iniciado</option>
                                  <option value="Terminado">Terminado</option>
                                  <option value="Enviado">Enviado</option>
                                  <option value="En Proceso">En Proceso</option>
                                  <option value="Finalizado">Finalizado</option>                                   
                                </select>
                           </div>  
                          

                       </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button @click="guardarCotizacion()" type="submit" data-dismiss="modal" class="btn btn-primary">Agregar Cotizacion</button>
                </div>
              </div>
            </div>
          </div>
          <!-- MODAL MODIFICAR -->
           <div  :class="{mostrar:modal}" class="modal fade" id="modalEdit" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content" >
                <div class="modal-header">
                  <h5 class="modal-title"  id="exampleModalLabel">Modificar  Cotizacion</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                   <form action="">
                           
                          <input required v-model="cotizacionEdit.id" type="hidden" class="form-control" id="id" name="id" placeholder="escribir Nombre">
                           
                           <div class="my-4">
                                <label for="nombre">Nombre</label>
                                <!-- enlazar un input con una data  -->
                                <input required v-model="cotizacionEdit.nombre" type="text" class="form-control" id="nombre" name="nombre" placeholder="escribir Nombre">
                           </div>
                           <div class="my-4">
                                <label for="cliente">Cliente</label>
                                  <select v-model="cotizacionEdit.cliente_id" :options="clientes" name="clientes" class="form-control">
                                   <option disabled value="0">Seleccionar uno...</option>
                                    <option v-for="client in clientes" :value="client.id"> {{client.nombre}}</option>                                  
                                   
                                </select>
                           </div> 
                            <div class="my-4">
                                <label for="descripcion">Descripcion</label>
                                <textarea v-model="cotizacionEdit.descripcion" type="text" class="form-control" id="descripcion" name="descripcion" placeholder="escribir descripcion"></textarea>
                           </div>
                            <div class="my-4">
                                <label for="stock">codigo</label>
                                <input v-model="cotizacionEdit.codigo"  type="number" min="0" class="form-control" id="codigo" name="codigo" placeholder="escribir codigo">
                           </div>  
                           <div class="my-4">
                                <label for="stock">Estado</label>
                                 <select v-model="cotizacionEdit.estado" id="inputState" class="form-control" name="estado">
                                  <option selected>Estado de cotizacion...</option>
                                  <option value="Iniciado">Iniciado</option>
                                  <option value="Terminado">Terminado</option>
                                  <option value="Enviado">Enviado</option>
                                  <option value="En Proceso">En Proceso</option>
                                  <option value="Finalizado">Finalizado</option>                                   
                                </select>
                           </div>  
                          

                       </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button @click="modificarCotizacion()" type="submit" data-dismiss="modal" class="btn btn-primary">Modificar</button>
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
                    codigo
                  </th>
                   <th>
                    estado
                  </th>
                  <th colspan="2" style="ali">
                    <button type="button"   class="btn btn-success btn-round btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="material-icons">add_box</i>  Agregar</button>
                  </th>
                 
                </thead>
                <tbody>
                   <tr v-for="cot in cotizaciones" :key="cot.id">
                        <th scope="row">{{cot.id}}</th>
                        <td>{{cot.nombre}}</td>
                        <td>{{cot.descripcion}}</td>
                        <td>{{cot.codigo}}</td>
                        <td>{{cot.estado}}</td>                   
                        
                        <td><button @click="AbrirModalEdit(cot)" data-toggle="modal" data-target="#modalEdit" class="btn btn-info btn-sm">Editar</button></td>
                        <td><button @click="eliminar(cot.id)" class="btn btn-danger btn-sm">Eliminar</button></td>
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
          modificar:true,
          modal:0,
          idCotizacion:0,
          tituloModal:'',         
           
           cotizaciones:[],
           // articulo para crear
            cotizacion:{
            nombre:'',
            cliente_id:'',
            descripcion:'',
            codigo:'',
            estado:'',
            },

            cotizaciones:[],
           // articulo para modificar
            cotizacionEdit:{
            id:'',
            nombre:'',
            cliente_id:'',
            descripcion:'',
            codigo:'',
            estado:'',
            },
          // Creamos objetivo de clientes
          clientes:[],
         
           
           

        }
        
    },
     methods:{

      //  LISTAR CLIENTES
         async listar()
         {
             const res=await axios.get('cotizaciones/list');
             this.cotizaciones=res.data;
         },  

         //ELIMINAR
          async eliminar(id)  
         {
           const res=await axios.delete('cotizaciones/'+id); 
            //  PARA QUE SE RECARGUE LA TABLA          
            this.listar();
         }, 

        //  CONSULTANDO CLIENTES PARA EL SELECT
          async clientesListar()  
         {
           const res=await axios.get('clientes/list'); 
            this.clientes=res.data;
         }, 

        //  GUARDAR COTIZACION
        
         async guardarCotizacion()
         {
            const res=await axios.post('cotizacion/store',this.cotizacion)
            // RESPUESTA POSITIVA
            .then(response => {
                  this.cotizacion.nombre="",
                  this.cotizacion.codigo="",
                  this.cotizacion.cliente_id="",
                  this.cotizacion.estado="",
                  this.cotizacion.descripcion="",
                  this.listar();
              })
               // RESPUESTA NEGATIVA
              .catch(err => {
                alert('favor completar los campos')     
              })                     
            
            
         },          
        //  RELLENAR MODAL DE DATOS AL DAR CLICK EN EDITAR
          async AbrirModalEdit(data)
          {
              this.cotizacionEdit.id=data.id,
              this.cotizacionEdit.nombre=data.nombre,
              this.cotizacionEdit.codigo=data.codigo,
              this.cotizacionEdit.cliente_id=data.cliente_id,
              this.cotizacionEdit.estado=data.estado,
              this.cotizacionEdit.descripcion=data.descripcion,
              this.idCotizacion=data.id       
          },
          
             async modificarCotizacion()
          {
              const res=await axios.put('cotizacion/'+this.idCotizacion,this.cotizacionEdit)

               .then(response => {
                  this.listar();
              })
               // RESPUESTA NEGATIVA
              .catch(err => {
                alert('favor completar los campos')     
              })  
             
          },
    },      
    

    // paa que se se inicie la funcion listar
    created(){
        this.listar();
        this.clientesListar();
    },
    }
</script>
