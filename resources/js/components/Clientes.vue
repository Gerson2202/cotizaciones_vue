
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
                  <th>
                    Tiempo De camioneta
                  </th>
                 
                </thead>
                <tbody>
                   <tr v-for="art in clientes" :key="art.id">
                        <th scope="row">{{art.id}}</th>
                        <td>{{art.nombre}}</td>
                        <td>{{art.descripcion}}</td>
                        <td>{{art.tiempo_camioneta}}</td>
                        <td><button @click="modificar=true; abrirModal(art)" class="btn btn-info btn-sm">Editar</button></td>
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
         },  
        
        
       
    },

    // paa que se se inicie la funcion listar
    created(){
        this.listar();
    },
    }
</script>
