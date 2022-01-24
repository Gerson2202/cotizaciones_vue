
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
                    Descripion
                  </th>
                   <th>
                    Direccion
                  </th>
                  <th>
                    T.envio
                  </th>
                  <th>
                    opciones
                  </th>
                 
                </thead>
                <tbody>
                   <tr v-for="prov in proveedores" :key="prov.id">
                        <th scope="row">{{prov.id}}</th>
                        <td>{{prov.nombre}}</td>
                        <td>{{prov.descripcion}}</td>
                        <td>{{prov.direccion}}</td>
                        <td>{{prov.tiempo_envio}}</td>
                        <td><button @click="modificar=true; abrirModal(prov)" class="btn btn-info btn-sm">Editar</button>
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
        
        
       
    },

    // paa que se se inicie la funcion listar
    created(){
        this.listar();
    },
    }
</script>
