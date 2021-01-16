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
                        <button type="button" style="margin-left: 10px" @click="abrirModal('salida','registrar')" class="btn btn-info" >
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </button>
                        
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control col-md-3" v-model="criterio">
                                      <option value="motivo">Motivo</option>
                                      
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
                                     <th>Costo</th>
                                    <th>Valor</th>
                                    <th>Fecha y Hora</th>
                                   
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="salida in arraySalida" :key="salida.id">
                                    
                                    <td v-text="salida.idusuario"></td>
                                    <td v-text="salida.idarticulo"></td>
                                    <td v-text="salida.motivo"></td>
                                    <td v-text="salida.unidades"></td>
                                    <td v-text="salida.costo"></td>
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
                  <!--Inicio del modal agregar/actualizar-->
            <div class="modal fade"  tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" v-text="tituloModal"></h4>
                            <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Usuario</label>
                                    <div class="col-md-9">
                                         <select class="form-control" v-model="idusuario">
                                            
                                            <option value="0" disabled>
                                                Seleccionar
                                            </option>
                                            <option v-for="user in arrayUsuario" :key="user.id" :value="user.id" v-text="user.usuario"></option>
                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Articulo</label>
                                    <div class="col-md-9">
                                        <select class="form-control" v-model="idarticulo" >
                                               <option value="0" disabled>
                                                Seleccionar
                                                </option>
                                                <option v-for="articulo in arrayArticulo" :key="articulo.id" :value="articulo.id" v-text="articulo.nombre"></option>
                                        </select>
                                        
                                    </div>
                                </div>    
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Motivo</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="motivo" class="form-control" placeholder="Motivo de la salida">
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Unidades</label>
                                    <div class="col-md-9">
                                        <input type="number" v-model="unidades" class="form-control" >
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Costo</label>
                                    <div class="col-md-9">
                                        <input type="number" v-model="costo"    class="form-control" >
                                        
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">valor</label>
                                    <div class="col-md-9">
                                        <input type="number" v-model="valor" class="form-control" >
                                        
                                    </div>
                                </div>
                                
                                <div v-show="errorPersona" class="form-group row div-error">
                                    <div class="text-center text-error">
                                        <div v-for="error in errorMostrarMsjPersona" :key="error" v-text="error"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button"  class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                            <button type="button" style="margin-left: 10px" v-if="tipoAccion==1" class="btn btn-primary" @click="registrarPersona()">Guardar</button>
                            <button type="button" style="margin-left: 10px" v-if="tipoAccion==2" class="btn btn-primary" @click="actualizarPersona()">Actualizar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!--Fin del modal-->
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
                costo: 0.0,
                valor: 0,
                arraySalida :[],
                arrayUsuario:[],
                arrayArticulo:[],
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
                buscar : '',
                usuario:'',
                nombre:''
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
              seleccionarUsuario(){
                  let me=this;
                var url= '/user/seleccionarUser';
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayUsuario = respuesta.usuarios;
                    
                    //console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            seleccionarArticulo(){
                  let me=this;
                var url= '/articulo/seleccionarArticulo';
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayArticulo = respuesta.articulos;
                    
                    //console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            abrirModal(modelo, accion, data = []){
                switch(modelo){
                    case "salida":{
                        switch(accion){
                            case "registrar":
                                {
                                    this.modal = 1;
                                    this.tituloModal = 'Registrar Salida';
                                    this.idusuario = 0;
                                    this.idarticulo = 0;
                                     this.motivo = '';
                                    this.unidades = 0;
                                      this.costo = 0;
                                    this.valor = 0;
                                    this.tipoAccion = 1
                                    break;
                                }
                            case "actualizar":
                                {
                                   // console.log({data});
                                   this.modal=1;
                                   this.tituloModal='Actualizar Salida';
                                   this.tipoAccion=2;
                                   this.salida_id=data['id'];
                                   this.idusuario = data['idusuario'];
                                   this.idarticulo = data['idarticulo'];
                                   this.motivo = data['motivo'];
                                   this.unidades = data['unidades'];
                                   this.costo = data['costo'];
                                   this.valor = data['valor'];
                                   break;

                                }    
                        }
                    }
                }
                this.seleccionarUsuario();
                this.seleccionarArticulo();
            },
             cerrarModal(){

                this.modal = 0;
                this.tituloModal = '';
                this.idusuario = 0;
                this.idarticulo = 0;
                this.motivo = '';
                this.unidades = 0;
                this.costo = 0;
                this.valor = 0;
             
                this.errorPersona = 0;
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
