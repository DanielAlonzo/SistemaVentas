<template>
    <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/main">Inicio</a></li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="icon-user-following"></i> Salidas
                        
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control col-md-3" v-model="criterio">
                                      <option value="motivo">Motivo</option>
                                      <option value="descripcion">Descripción</option>
                                    </select>
                                   <input type="text" v-model="buscar" @keyup.enter="listarRol(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" @click="listarRol(1,buscar,criterio)" class="btn btn-info"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                   
                                    <th>Usuario</th>
                                    <th>Artículo</th>
                                    <th>Motivo</th>
                                    <th>Unidades</th>
                                    <th>Valor</th>
                                    <th>Fecha y Hora</th>
                                    <th>Opciones</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="salida in arraySalida" :key="salida.id">
                                    
                                    <td v-text="salida.idusuario"></td>
                                    <td v-text="salida.idarticulo"></td>
                                    <td v-text="salida.motivo"></td>
                                    <td v-text="salida.unidades"></td>
                                     <td v-text="salida.valor"></td>
                                    <td v-text="salida.fecha_hora"></td>
                                   
                                </tr>
                                
                            </tbody>
                        </table>
                        <nav>
                            <!--Inicio de Paginacion-->
                            <ul class="pagination justify-content-center">
                                <li class="page-item" v-if="pagination.current_page > 1">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)">Anterior</a>
                                </li>
                                <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(page,buscar,criterio)" v-text="page"></a>
                                </li>
                                <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)">Siguiente</a>
                                </li>
                            </ul>
                        </nav>
                        <!--Final de Paginacion-->
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
           
     
            
        </main>
</template>

<script>
    export default {
        data (){
            return{
                salida_id:0,
                idusuario: 0,
                idarticulo: 0,
                motivo: '',
                unidades: 0,
                valor: 0.0,
                arraySalida :[],
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                pagination : {
                     'total'         : 0,
                    'current_page'   : 0,
                    'per_page'      : 0,
                    'last_page'   : 0,
                    'from'        : 0,
                    'to'         : 0,
                },
                offset : 3,
                criterio : 'nombre',
                buscar : ''
            }
            
        },
        computed:{

              isActived: function(){
                return this.pagination.current_page;
            },
            //Calcula los elementos de la paginación
            pagesNumber: function() {
                if(!this.pagination.to) {
                    return [];
                }
                
                var from = this.pagination.current_page - this.offset; 
                if(from < 1) {
                    from = 1;
                }

                var to = from + (this.offset * 2); 
                if(to >= this.pagination.last_page){
                    to = this.pagination.last_page;
                }  

                var pagesArray = [];
                while(from <= to) {
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;             

            }
        },
        methods : {
            listarRol (page,buscar,criterio){
                let me=this;
                var url= '/salida?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arraySalida = respuesta.salidas.data;
                    me.pagination= respuesta.pagination;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            cambiarPagina(page, buscar, criterio){
                let me = this;
                me.pagination.current_page = page; //actualiza la pagina actual

                me.listarRol(page, buscar, criterio);//visualiza los datos de la pagina enviada
            },
            
            
           
            
        },   
           
        mounted() {
            this.listarRol(1,this.buscar, this.criterio);
        }
    }
</script>
<style>
    .modal-content{
        width: 100% !important;
        position: absolute !important;
       
    }
    .mostrar{
        display: list-item !important;
        opacity: 1 !important;
        position: absolute !important;
        background-color: #3c29297a !important;
    }
    .div-error{
        display:flex;
        justify-content: center;
    }
    .text-error{
        color: red !important;
        font-weight: bold;
    }
</style>
