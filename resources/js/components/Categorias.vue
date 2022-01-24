
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
                 
                  
                 
                </thead>
                <tbody>
                   <tr v-for="cat in categorias" :key="cat.id">
                        <th scope="row">{{cat.id}}</th>
                        <td>{{cat.nombre}}</td>
                        <td><button @click="modificar=true; abrirModal(cat)" class="btn btn-info btn-sm">Editar</button>
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
           
            categorias:[],
           
           

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
         },  
        
        
       
    },

    // paa que se se inicie la funcion listar
    created(){
        this.listar();
    },
    }
</script>
