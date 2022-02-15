
<template>
    <div class="container">
        <div class="row justify-content-center">

           <!-- Modal PARA CREAR PRODUCTO -->
          <div   class="modal fade" id="exampleModal" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content" >
                <div class="modal-header">
                  <h5 class="modal-title"  id="exampleModalLabel">Agregar Producto</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                   <form action="">
                           <div class="my-4">
                                <label for="nombre">Nombre</label>
                                <!-- enlazar un input con una data  -->
                                <input v-model="producto.nombre"  type="text" class="form-control" id="nombre" name="nombre" placeholder="escribir Nombre">
                           </div>
                            <div class="my-4">
                                <label for="cliente">Categoria</label>
                                  <select v-model="producto.categoria_id" :options="categorias" name="categoria_id" class="form-control">
                                    <option disabled value="0">Seleccionar uno...</option>
                                    <option v-for="cate in categorias" :value="cate.id"> {{cate.nombre}}</option> 
                                </select>
                           </div> 
                          
                            <div class="my-4">
                                <label for="descripcion">Descripcion</label>
                                <textarea v-model="producto.descripcion" type="text" class="form-control" id="descripcion" name="descripcion" placeholder="escribir descripcion"></textarea>
                           </div>                          

                       </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button @click="guardarProducto()" type="submit" data-dismiss="modal" class="btn btn-primary">Agregar Cotizacion</button>
                </div>
              </div>
            </div>
          </div>

           <!-- Modal PARA MODIFICAR PRODUCTO -->
          <div   class="modal fade" id="exampleModal2" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content" >
                <div class="modal-header">
                  <h5 class="modal-title"  id="exampleModalLabel">Editar Producto</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                   <form action="">
                           <div class="my-4">
                                <label for="nombre">Nombre</label>
                                <!-- enlazar un input con una data  -->
                                <input v-model="productoEdit.nombre"  type="text" class="form-control" id="nombre" name="nombre" placeholder="escribir Nombre">
                           </div>
                            <div class="my-4">
                                <label for="cliente">Categoria</label>
                                  <select v-model="productoEdit.categoria_id" :options="categorias" name="categoria_id" class="form-control">
                                   <option disabled value="0">Seleccionar uno...</option>
                                    <option v-for="cate in categorias" :value="cate.id"> {{cate.nombre}}</option>                                  
                                   
                                </select>
                           </div> 
                          
                            <div class="my-4">
                                <label for="descripcion">Descripcion</label>
                                <textarea v-model="productoEdit.descripcion" type="text" class="form-control" id="descripcion" name="descripcion" placeholder="escribir descripcion"></textarea>
                           </div>                          

                       </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button @click="modificarProducto()" type="submit" data-dismiss="modal" class="btn btn-primary">Agregar Cotizacion</button>
                </div>
              </div>
            </div>
          </div>

           <div class="table-responsive">
              <table class="table" id="tablaProductos">
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
                  <th row="2">
                   <button type="button"   class="btn btn-success btn-round btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="material-icons">add_box</i>  Agregar</button>

                  </th>
                  
                 
                </thead>
                <tbody>
                   <!-- <tr v-for="prod in productos" :key="prod.id">
                        <th scope="row">{{prod.id}}</th>
                        <td>{{prod.nombre}}</td>
                        <td>{{prod.descripcion}}</td>
                        <td><button data-toggle="modal" data-target="#exampleModal2" @click="AbrirModalEdit(prod)" class="btn btn-info btn-sm">Editar</button>
                        <button @click="eliminar(prod.id)" class="btn btn-danger btn-sm">Eliminar</button><span></span>
                        <a class="btn btn-sm btn-info" :href="`/produ cto/show/${prod.id}`">Ver detalles</a></td>
                    </tr>                    -->
                 
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
           
            productos:[],
            categorias:[],
            idProducto:0,


            producto:{
              nombre:'',
              categoria_id:'',
              descripcion:''
            },
            productoEdit:{
              nombre:'',
              categoria_id:'',
              descripcion:''
            },
           
           

        }
        
    },
     methods:{
      
          // LISTAR PRODUCTOS con datable
          // PARA EL BOTON ELINMAR 
          async atento()
          {
            
             let fila;
             $(document).on("click",".btnEliminar",function(){
                fila= $(this).closest("tr");
                let id= parseInt(fila.find('td:eq(0)').text()); //tomamos el id
                 $.ajax(
                  {
                        url: "productos/"+id, 
                        type: "get",
                        processData: false,   //tell jQuery not to process the data
                        contentType: false,//tell jQuery not to set contentType
                        
                        success: function()
                        {
                          
                            alert('se elimino ocon exito')
                            location.reload();
                        }
            
                      })  
                
             });            
              
          },
          // PARA EL BOTON VER
          async atento2()
          {
            
             let fila1;
             $(document).on("click",".btnVer",function(){
                fila1= $(this).closest("tr");
                let id1= parseInt(fila1.find('td:eq(0)').text()); //tomamos el id
                // FALTA DIRECCIONARLO ALA PAGINA
                let src = "/producto/show/"+id1;
                var btn = $('.btnVer').attr("href",src); 
             });            
              
          },
         
         async listar() 
         {
             const res=await axios.get('productos/list');
             this.productos=res.data;
              $('#tablaProductos').DataTable( {
                 data: res.data,
                    columns: [
                        { data: 'id' },
                        { data: 'nombre' },
                        { data: 'descripcion' },
                        {defaultContent:  '<button @click="eliminar(prod.id)" class="btn btn-danger btn-sm btnEliminar">Eliminar</button><span></span> <a class="btn btn-sm btn-info btnVer" href="#">Ver detalles</a></td>'}                 
                    ]
             } );
          },  
          //LISTAR PRODUCTOS sin datable
        //  async listar()
        //  {
        //      const res=await axios.get('productos/list');
        //       this.productos=res.data;            
        //  },   
         
          // async eliminar(data)
          // {
          //   const res=await axios.delete('productos/'+data);
          //   this.listar();
          // },

         //  CONSULTANDO CATEGORIAS PARA EL SELECT
          async categoriasListar()  
         {
           const res=await axios.get('categorias/list'); 
            this.categorias=res.data;
         }, 

        //  GUARDAR PRODUCTO 
         async guardarProducto(){
            const res=await axios.post('producto/store',this.producto)
            // RESPUESTA POSITIVA
            .then(response => {
                  this.producto.nombre="",
                  this.producto.categoria_id="",
                  this.producto.descripcion="",
                  location.reload();
                  // this.listar();
              })
               // RESPUESTA NEGATIVA
              .catch(err => {
                alert('favor completar los campos')     
              })  
         },

           //  RELLENAR MODAL DE DATOS AL DAR CLICK EN EDITAR
          async AbrirModalEdit(data)
          {
              alert('hols')
              this.productoEdit.nombre=data.nombre,
              this.productoEdit.categoria_id=data.categoria_id,
              this.productoEdit.descripcion=data.descripcion,
              this.idProducto=data.id       
          },
           
          async modificarProducto()
          {
             const res=await axios.put('producto/'+this.idProducto,this.productoEdit)

               .then(response => {
                 console.log(res);
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
        this.categoriasListar();
        this.atento();
         this.atento2();
    },
     }
</script>
