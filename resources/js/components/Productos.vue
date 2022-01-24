
<template>
    <div class="container">
        <div class="row justify-content-center">
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
                  <th row="2">
                    Opciones
                  </th>
                  
                 
                </thead>
                <tbody>
                   <tr v-for="prod in productos" :key="prod.id">
                        <th scope="row">{{prod.id}}</th>
                        <td>{{prod.nombre}}</td>
                        <td>{{prod.descripcion}}</td>
                        <td><button @click="modificar=true; abrirModal(prod)" class="btn btn-info btn-sm">Editar</button>
                        <button @click="eliminar(prod.id)" class="btn btn-danger btn-sm">Eliminar</button></td>
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
           
            productos:[],
           
           

        }
        
    },
     methods:{

      //  LISTAR PRODUCTOS
         async listar()
         {
             const res=await axios.get('productos/list');
             this.productos=res.data;
         },  
         async eliminar(id)
         {
           const res=await axios.delete('productos/'+id);
           this.listar();
         }
        
        
       
    },

    // paa que se se inicie la funcion listar
    created(){
        this.listar();
    },
    }
</script>
