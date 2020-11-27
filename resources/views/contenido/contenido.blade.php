@extends('principal')
    @section('contenido')
    @if(Auth::check())
            @if(Auth::user()->idrol==1)
                
                <template v-if="menu==0">
        
                    <h1></h1>
                    
                    <img  src="../img/logomenu.png" align="right" alt="logo"  style="max-width:100%;width:auto;height:auto;margin-left: 600px;margin-top: 70px;">
                
                </template>

                <template v-if="menu==1">
                    <categoria></categoria>
                
                </template>
                <template v-if="menu==2">
                    <articulo></articulo>
                
                </template>

                <template v-if="menu==3">
                   <ingreso></ingreso>
                
                </template>
                <template v-if="menu==4">
                    <proveedor></proveedor>
                
                </template>

                <template v-if="menu==5">
                    <h1>Ventas</h1>
                
                </template>
                <template v-if="menu==6">
                    <cliente></cliente>
                
                </template>

                <template v-if="menu==7">
                    <user></user>
                
                </template>
                <template v-if="menu==8">
                    <rol></rol>      
                </template>

                <template v-if="menu==9">
                    <h1>Reporte de ingresos</h1>
                
                </template>
                <template v-if="menu==10">
                    <h1>Reporte de ventas</h1>
                
                </template>

                <template v-if="menu==11">
                    <h1>Ayuda</h1>
                
                </template>
                <template v-if="menu==12">
                    <h1>Acerca de</h1>
                
                </template>
                
            @elseif(Auth::user()->idrol==2)
               
                 <template v-if="menu==5">
                     <h1>Ventas</h1>
        
                 </template>
                 <template v-if="menu==6">
                     <cliente></cliente>
        
                 </template>
                 <template v-if="menu==10">
                     <h1>Reporte de ventas</h1>
        
                 </template>

                 <template v-if="menu==11">
                      <h1>Ayuda</h1>
        
                </template>
                 <template v-if="menu==12">
                    <h1>Acerca de</h1>
                </template>
            @elseif(Auth::user()->idrol==3)
                 
                <template v-if="menu==1">
                    <categoria></categoria>
                
                </template>
                <template v-if="menu==2">
                    <articulo></articulo>
                
                </template>

                <template v-if="menu==3">
                    <ingreso></ingreso>
                
                </template>
                <template v-if="menu==4">
                    <proveedor></proveedor>
                
                </template>
                <template v-if="menu==9">
                    <h1>Reporte de ingresos</h1>
        
                </template>
                <template v-if="menu==11">
                    <h1>Ayuda</h1>
        
                </template>
                <template v-if="menu==12">
                     <h1>Acerca de</h1>
        
                </template>
            @else

            @endif
    @endif
        
    @endsection    