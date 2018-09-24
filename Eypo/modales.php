<!-- Modal para cliente -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">   
      <div class="modal-header"
        <h5 class="modal-title">Lista de Socios de Negocios</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <input type="text" id="buscadorCliente" placeholder="Buscar" title="Buscador cliente">
          </div>
        </div>
        <hr>
          <table class="table table-responsive table-hover table-striped tblblock"  id="tblcliente"style="font-size: .7rem">
            <thead>
              <tr>
                <th width="50px" class="fth-header">N°</th>
                <th width="120px" class="fth-header">Codigo</th>
                <th width="350px" class="fth-header">Nombre del cliente</th>
              </tr>
            </thead>
          <tbody>
          </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>   

<!-- Modal para artículos -->
<div class="modal fade" id="myModalArticulos">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title">Lista de Artículos</h5>
          <button type="button" id="closeArti" class="closeArt" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <input type="text" id="buscadorArticulo" placeholder="Buscar" title="Buscador Articulo">
            </div>
          </div>
          <div id="divalerta" class="alert alert-warning" style="display: none;">
            <strong>Alerta!</strong> No has seleccionado ningún Cliente.
          </div>
            <table class="table table-hover table-striped tblblock" id="tblarticulo" style="font-size: .7rem;" >
                <thead>
                  <tr>
                      <th width="50px">#</th>
                      <th width="100px">Código</th>
                      <th width="240px">Articulo</th>
                      <th>Stock</th>
                      <th width="50px">Comp</th>
                      <th width="50px">Pedido</th>
                      <th width="50px">Cod alm</th>
                      <th width="150px">Almacen</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
          </div>   
      </div>
    </div>
  </div>
</div>

<!-- Modal para ofertas -->
<div class="modal fade" id="modalBuscarOfertas">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header"
        <h5 class="modal-title">Buscar Oferta de venta</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <input type="text" id="buscadorOfertas" placeholder="Buscar" title="Buscador General">
          </div>
        </div>
        <hr>
        <table class="table table-striped tblblock" id="tblBuscarOfertas" style="font-size: .8rem">
          <thead>
            <tr>
              <th width="70px">N° Oferta</th>
              <th width="130px">Codigo Cliente</th>
              <th width="150px">Fecha creación</th>
              <th width="100px">Estatus</th>
            </tr>
          </thead>
        <tbody>
        </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal para ordenes -->
<div class="modal fade" id="modalBuscarOrdenes">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header"
        <h5 class="modal-title">Buscar Orden de venta</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <input type="text" id="buscadorOrdenes" placeholder="Buscar" title="Buscador General">
          </div>
        </div>
        <hr>
        <table class="table table-striped tblblock" id="tblBuscarOrdenes" style="font-size: .8rem">
          <thead>
            <tr>
              <th width="20px">N° Oferta</th>
              <th width="130px">Codigo Cliente</th>
              <th width="150px">Fecha creación</th>
              <th width="100px">Estatus</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal para buscarSocios -->
<div class="modal fade" id="modalBuscarSocios" tabindex="-1" role="dialog" aria-labelledby="modalBuscarSocios" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buscar socios de Negocios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <input type="text" id="buscadorSocios" placeholder="Buscar">
          </div>
        </div>
        <hr>
        <div id="divalerta" class="alert alert-warning" style="display: none;">
          <strong>Alerta!</strong> No has seleccionado ningún Cliente.
        </div>

          <table class="table-sm table table-hover table-bordered tblblock" id="tblSocios" style="font-size: .8rem">
            <thead>
              <tr style="text-align: center">
                <th>#</th>
                <th>CódigoSN</th>
                <th>Nombre</th>
                <th>activo</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    </div>
  </div>
</div>
<!-- Modal para Direcciones-->
<div class="modal fade" id="myModalDireccion">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Lista de Direcciones</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <input type="text" id="buscadorDireccion" placeholder="Buscar">
          </div>
        </div>
        <hr>
        <div id="divalerta" class="alert alert-warning" style="display: none;">
          <strong>Alerta!</strong> No has seleccionado ningún Cliente.
        </div>

        <table class="table-sm table table-hover table-bordered tblblock" id="tblDireccion" style="font-size: .9rem">
          <thead>
            <tr style="text-align: center">
              <th>#</th>
              <th>Codigo</th>
              <th>Id Direccion</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal para personas de contacto-->
<div class="modal fade" id="modalPersonasContacto">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title">Lista de Personas de contacto</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <input type="text" id="buscadorPersonaContacto" placeholder="Buscar">
            </div>
          </div>
          <hr>
          <table class="table-sm table table-hover table-bordered tblblock" id="tblPersonaContacto" style="font-size: .9rem">
            <thead>
              <tr style="text-align: center">
                <th>#</th>
                <th>Codigo</th>
                <th>Id Direccion</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal para query -->
<div class="modal fade" id="modalQuery">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title">Lista de Query</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

      <div class="modal-body">
        <ul id="listaDeQuerys" >
          <a href="#"> <li style="list-style: none;" id="BackOrder" data-target="#BackOrderVentas" data-toggle="modal">Back Order Ventas nuevo</li></a>
          <a href="#"> <li style="list-style: none;" id="Carteras" data-target="#CarterasVentas" data-toggle="modal">Carteras</li></a>
          <a href="#"> <li style="list-style: none;" id="Comisiones" data-target="#ComisionesVentas" data-toggle="modal">Comisiones</li></a>
          <a href="#"> <li style="list-style: none;" id="EntradasArt" data-target="#EntradasVentas" data-toggle="modal">Entradas Articulos</li></a>
          <a href="#"> <li style="list-style: none;" id="KitsVigentes" data-target="#KitsVentas" data-toggle="modal">Kits vigentes en sistema (reporte original en Admon)</li></a>
          <a href="#"> <li style="list-style: none;" id="OFVCliente" data-target="#OfertaVentaCliente" data-toggle="modal">Oferta de venta linea especial cliente</li></a>
          <a href="#"> <li style="list-style: none;" id="OFVClienteyFecha" data-target="#OfertaClienteF" data-toggle="modal">Oferta de venta linea especial cliente y fecha</li></a>
          <a href="#"> <li style="list-style: none;" id="OFVFecha" data-target="#OfertaEspFecha" data-toggle="modal">Oferta de venta linea especial fecha</li></a>
          <a href="#"> <li style="list-style: none;" id="pedidosDelDia" data-target="#Pedidos" data-toggle="modal">Pedidos del día</li></a>
        </ul>
      </div>
    </div>
  </div>
</div>
<!--Modal BackOrderVentas-->

<div class="modal fade" id="BackOrderVentas">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title">Back Order Ventas</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
      <div class="modal-body" >
        <!--escribir contenido de modal  -->
        <p><b>Consulta: Criterios de selección</b></p>
   <fieldset>
           <div class="row" style="font-size: .6rem">
            <label for="" class="col-sm-5 col-form-label" style="padding-right: 0px; padding-bottom:  0px;">Fecha de contabilización igual a</label>
            <div class="col-sm-6">
               <input type="date" style="width: 70%; height:23px;" class="" id="empleado" value="">
            </div>
          </div>
          <br>
          <div class="row" style="font-size: .6rem">
           <label for="" class="col-sm-5 col-form-label" style="padding-right: 0px; padding-bottom:  0px;">Fecha de contabilización igual a</label>
           <div class="col-sm-6">
              <input type="text" style="width: 70%; height:23px;" class="" id="empleado" value="">
           </div>
         </div>
         <br>
         <div class="row" style="font-size: .6rem">
          <label for="" class="col-sm-5 col-form-label" style="padding-right: 0px; padding-bottom:0px;">Nombre de cliente/proveedor igual a</label>
          <div class="col-sm-6">
             <input type="text" style="width: 70%; height:23px;" class="" id="empleado" value="">
          </div>
        </div>
         <br>
         <div class="row" style="font-size: .6rem">
          <label for="" class="col-sm-5 col-form-label" style="padding-right: 0px; padding-bottom:0px;">Código de cliente igual a</label>
          <div class="col-sm-6">
             <input type="text" style="width: 70%; height:23px;" class="" id="empleado" value="">
          </div>
        </div>
        <br>
        <div class="row" style="font-size: .6rem">
         <div class="col-sm-6">
            <button class="btn btn-sm" style="background-color: orange" title="Cancelar">OK</button>
            <button class="btn btn-sm" style="background-color: orange" title="Cancelar">Cancelar</button>
         </div>
       </div>
    </fieldset>
      </div>
    </div>
  </div>
</div>

<!--Modal Carteras-->
<div class="modal fade" id="CarterasVentas">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title">Carteras</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

      <div class="modal-body">
        <!--escribir contenido de modal  -->
      </div>
    </div>
  </div>
</div>
<!--Modal Comisiones-->
<div class="modal fade" id="ComisionesVentas">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Comisiones</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p><b>Consulta: Criterios de selección</b></p>
        <fieldset>
          <div class="row" style="font-size: .6rem">
            <label for="" class="col-sm-5 col-form-label" style="padding-right: 0px; padding-bottom:  0px;">Fecha de contabilización superior/igual</label>
            <div class="col-sm-6">
              <input type="text" style="width: 70%; height:23px;" class="" id="empleado" value="">
            </div>
          </div>
          <br>
          <div class="row" style="font-size: .6rem">
            <label for="" class="col-sm-5 col-form-label" style="padding-right: 0px; padding-bottom:  0px;">Fecha contabilización Menor o igual</label>
            <div class="col-sm-6">
             <input type="text" style="width: 70%; height:23px;" class="" id="empleado" value="">
            </div>
          </div>
          <br>
          <div class="row" style="font-size: .6rem">
            <div class="col-sm-6">
              <button class="btn btn-sm" style="background-color: orange" title="Cancelar">OK</button>
              <button class="btn btn-sm" style="background-color: orange" title="Cancelar">Cancelar</button>
            </div>
          </div>
        </fieldset>
      </div>
    </div>
  </div>
</div>

<!--Modal Entradas Articulos-->
<div class="modal fade" id="EntradasVentas">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title">Entradas Articulos</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

      <div class="modal-body">
        <!--escribir contenido de modal  -->
        <p><b>Consulta: Criterios de selección</b></p>
        <fieldset>
          <div class="row" style="font-size: .6rem">
           <label for="" class="col-sm-5 col-form-label" style="padding-right: 0px; padding-bottom:  0px;">Fecha de contabilización superior/igual</label>
           <div class="col-sm-6">
              <input type="text" style="width: 70%; height:23px;" class="" id="empleado" value="">
           </div>
         </div>
        <br>
        <div class="row" style="font-size: .6rem">
         <div class="col-sm-6">
            <button class="btn btn-sm" style="background-color: orange" title="Cancelar">OK</button>
            <button class="btn btn-sm" style="background-color: orange" title="Cancelar">Cancelar</button>
         </div>
       </div>
        </fieldset>
      </div>
    </div>
  </div>
</div>

<!--Modal Kit Vigente en Sistema -->
<div class="modal fade" id="KitsVentas">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title">Kit Vigente en Sistema</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

      <div class="modal-body">
        <!--escribir contenido de modal  -->
        <p>Kit Vigente en Sistema (reporte original de admon):</p>
      </div>
    </div>
  </div>
</div>

<!--Modal Oferta de Venta línea especial cliente -->
<div class="modal fade" id="OfertaVentaCliente">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title">Oferta de Venta línea especial cliente</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

      <div class="modal-body">
        <!--escribir contenido de modal  -->
        <p><b>Consulta: Criterios de selección</b></p>
        <fieldset>
          <div class="row" style="font-size: .6rem">
           <label for="" class="col-sm-5 col-form-label" style="padding-right: 0px; padding-bottom:  0px;">Código de cliente/proveedor</label>
           <div class="col-sm-6">
              <input type="text" style="width: 70%; height:23px;" class="" id="empleado" value="">
           </div>
         </div>
        <br>
        <div class="row" style="font-size: .6rem">
         <div class="col-sm-6">
            <button class="btn btn-sm" style="background-color: orange" title="Cancelar">OK</button>
            <button class="btn btn-sm" style="background-color: orange" title="Cancelar">Cancelar</button>
         </div>
       </div>
        </fieldset>
      </div>
    </div>
  </div>
</div>

<!--Modal  Oferta de Venta línea especial cliente y fecha-->
<div class="modal fade" id="OfertaClienteF">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title">Oferta de Venta línea especial cliente y fecha</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

      <div class="modal-body">
        <!--escribir contenido de modal  -->
        <p><b>Consulta: Criterios de selección</b></p>
        <fieldset>
          <div class="row" style="font-size: .6rem">
           <label for="" class="col-sm-5 col-form-label" style="padding-right: 0px; padding-bottom:  0px;">Código de cliente/proveedor</label>
           <div class="col-sm-6">
              <input type="text" style="width: 70%; height:23px;" class="" id="empleado" value="">
           </div>
         </div>
         <br>
         <div class="row" style="font-size: .6rem">
          <label for="" class="col-sm-5 col-form-label" style="padding-right: 0px; padding-bottom:  0px;">Fecha de contabilización</label>
          <div class="col-sm-6">
             <input type="text" style="width: 70%; height:23px;" class="" id="empleado" value="">
          </div>
        </div>
        <br>
        <div class="row" style="font-size: .6rem">
         <label for="" class="col-sm-5 col-form-label" style="padding-right: 0px; padding-bottom:  0px;">Fecha de contabilización</label>
         <div class="col-sm-6">
            <input type="text" style="width: 70%; height:23px;" class="" id="empleado" value="">
         </div>
       </div>
        <br>
        <div class="row" style="font-size: .6rem">
         <div class="col-sm-6">
            <button class="btn btn-sm" style="background-color: orange" title="Cancelar">OK</button>
            <button class="btn btn-sm" style="background-color: orange" title="Cancelar">Cancelar</button>
         </div>
       </div>
        </fieldset>
      </div>
    </div>
  </div>
</div>

<!--Modal Oferta de Venta línea fecha -->
<div class="modal fade" id="OfertaEspFecha">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title">Oferta de Venta línea fecha</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

      <div class="modal-body">
        <!--escribir contenido de modal  -->
        <p><b>Consulta: Criterios de selección</b></p>
        <fieldset>
         <div class="row" style="font-size: .6rem">
          <label for="" class="col-sm-5 col-form-label" style="padding-right: 0px; padding-bottom:  0px;">Fecha de contabilización</label>
          <div class="col-sm-6">
             <input type="text" style="width: 70%; height:23px;" class="" id="empleado" value="">
          </div>
        </div>
        <br>
        <div class="row" style="font-size: .6rem">
         <label for="" class="col-sm-5 col-form-label" style="padding-right: 0px; padding-bottom:  0px;">Fecha de contabilización</label>
         <div class="col-sm-6">
            <input type="text" style="width: 70%; height:23px;" class="" id="empleado" value="">
         </div>
       </div>
        <br>
        <div class="row" style="font-size: .6rem">
         <div class="col-sm-6">
            <button class="btn btn-sm" style="background-color: orange" title="Cancelar">OK</button>
            <button class="btn btn-sm" style="background-color: orange" title="Cancelar">Cancelar</button>
         </div>
       </div>
        </fieldset>
      </div>
    </div>
  </div>
</div>

<!-- Pedidos del dia-->
<div class="modal fade" id="Pedidos">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title">Pedidos del dia</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

      <div class="modal-body">
        <!--escribir contenido de modal  -->
        <p><b>Consulta: Criterios de selección</b></p>
        <fieldset>
        <div class="row" style="font-size: .6rem">
         <label for="" class="col-sm-5 col-form-label" style="padding-right: 0px; padding-bottom:  0px;">Fecha de contabilización igual a</label>
         <div class="col-sm-6">
            <input type="text" style="width: 70%; height:23px;" class="" id="empleado" value="">
         </div>
       </div>
       <br>
       <div class="row" style="font-size: .6rem">
        <label for="" class="col-sm-5 col-form-label" style="padding-right: 0px; padding-bottom:  0px;">Status de documento igual a</label>
        <div class="col-sm-6">
          <select style="width: 70%; height:23px;">
            <option value="" disabled selected></option>
            <option value="">O - Abiertos</option>
            <option value="">C - Cerrado</option>
          </select>
        </div>
      </div>
        <br>  
        <div class="row" style="font-size: .6rem">
         <div class="col-sm-6">
            <button class="btn btn-sm" style="background-color: orange" title="Cancelar">OK</button>
            <button class="btn btn-sm" style="background-color: orange" title="Cancelar">Cancelar</button>
         </div>
       </div>
        </fieldset>
      </div>
    </div>
  </div>
</div>

<!-- Modal para mensajes-->  
<div class="modal fade" id="modalMensaje">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Lista de Mensajes</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#bandejaDeEntrada" role="tab" aria-controls="home" aria-selected="true">Bandeja de entrada</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#bandejaDeSalida" role="tab" aria-controls="home" aria-selected="true">Bandeja de salida</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#bandejaDeSalida" role="tab" aria-controls="home" aria-selected="true">Mensajes enviados</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="bandejaDeEntrada" role="tabpanel" aria-labelledby="home-tab">
                <div style="height: 250px; overflow-y: hidden;">
                  <table class="table table-sm table-hover table-striped tblblock" id="tblMensajes">
                    <thead class="text-center">
                      <th width="100px">N° Orden</th>
                      <th width="270px">Estatus</th>
                      <th width="130px">Fecha</th>
                      <th width="100px">Hora</th>
                      <th width="100px">Desde</th>
                      <th style="display: none"></th>
                      <th style="display: none"></th>
                      <th><i class="far fa-file"></i> </th>
                    </thead>
                    <tbody>
                    
                    </tbody>
                  </table>
                </div>
                <br>
                <table class="table table-sm table-hover table-striped" id="tblMensajes2">
                  <thead>
                    <th width="70px">#</th>
                    <th width="140px">N° de Oferta</th>
                    <th width="210px">N° de Orden</th>
                    <th width="350px">Estatus del documento</th>
                    <th style="display: none"></th>
                  </thead>
                  <tbody>
                    <tr>
                      <td width="70px"></td>
                      <td width="140px"></td>
                      <td width="210px"></td>
                      <td width="350px"></td>
                      <td style="display: none"></td>
                    </tr>
                    <tr>
                      <td width="70px"></td>
                      <td width="140px"></td>
                      <td width="210px"></td>
                      <td width="350px"></td>
                      <td style="display: none"></td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal para arcos fabricar -->
<div class="modal fade" id="modalTablaFabricar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title">Lista de artículos para fabricar</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <input type="text" id="buscadorArcosFabricar" placeholder="Buscar">
            </div>
        </div>
        <br>
        <div class="table-responsive-sm">
          <table class="table table-hover table-sm" id="tblarticulo">
              <thead>
                  <tr>
                    <th style="text-align: center;">CódigoSN</th>
                    <th style="text-align: center;">NombreSN</th>
                  </tr>
              </thead>
              <tbody>
                <?php
              $consultasql = sqlsrv_query($conn,"SELECT Code, ItemName FROM ITT1 INNER JOIN OITM ON ITT1.Code = OITM.ItemCode");
              while ($Row = sqlsrv_fetch_array($consultasql)) { ?>
                <tr>
                  <td><?php echo $Row['Code']; ?></td>
              <td><?php echo $Row['ItemName']; ?></td>
                </tr>
              <?php } ?>
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal para arcos desarme -->
<div class="modal fade" id="modalTablaDesarmar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Lista de Artículos</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <input type="text" id="buscadorArcosDesarme" placeholder="Buscar">
          </div>
        </div>
        <br>
        <div class="table-responsive-sm">
          <table class="table table-hover table-sm" id="tblArcosDesarme">
            <thead>
                <tr>
                  <th style="text-align: center;">CódigoSN</th>
                  <th style="text-align: center;">NombreSN</th>
                </tr>
            </thead>
            <tbody>
              <?php
                $consultasql = sqlsrv_query($conn, "SELECT Code, ItemName FROM ITT1 INNER JOIN OITM ON ITT1.Code = OITM.ItemCode");
                while ($Row = sqlsrv_fetch_array($consultasql)) { ?>
                  <tr>
                    <td><?php echo $Row['Code']; ?></td>
                    <td><?php echo $Row['ItemName']; ?></td>
                  </tr>
                <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal para arcos consultagenera -->
<div class="modal fade" id="modalArcosConsultaGeneral">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title">Lista de Ordenes</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <input type="text" id="buscadorArcosFabricar" placeholder="Buscar">
            </div>
        </div>
        <br>
        <div class="table-responsive-sm">
          <table class="table table-hover table-sm table-striped tblblock" id="tblarcosGeneral">
              <thead>
                  <tr>
                    <th style="text-align: center;">Folio</th>
                    <th width="200px" style="text-align: center;">Solicitante</th>
                    <th style="text-align: center;">Empresa</th>
                    <th style="text-align: center;">Fecha de solicitud</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                include "conexion.php";
                $sql = "SELECT * FROM dbEypo.dbo.arcos ORDER BY folio DESC";
                $consultasql = sqlsrv_query($conn, $sql);
                while ($Row = sqlsrv_fetch_array($consultasql)) { ?>
                  <tr>
                    <td width="50px" style="text-align: center"><?php echo $Row['folio']; ?></td>
                    <td width="200px" style="text-align: center"><?php echo $Row['nombreSolicitante']; ?></td>
                    <td width="100px"><?php echo $Row['empresa']; ?></td>
                    

                  </tr>
                <?php } ?>
                <!-- hay pedo con las dos ultimas -->
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal condicones de pago  --> 
<div class="modal fade" id="modalCondicionPago" tabindex="-1" role="dialog" aria-labelledby="modalCondicionPago" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Condiciones de pago</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-sm table-striped" id="tblCondicionPago" style=" font-size: .8rem">
          <thead>
            <tr>
              <th width="150px">Código</th>      
              <th width="350px">Descripción</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            include "conexion.php";
              $sql = "SELECT * FROM Pruebas15nov16.dbo.IV_EY_PV_CondicionesPago";
              $consulta = sqlsrv_query($conn, $sql);
              while($Row = sqlsrv_fetch_array($consulta)) {
                echo $linea = '<tr><td width="150px">'.$Row['CodigoCondicion'].'</td>
                                <td width="350px">'.$Row['DescripcionCondicion'].'</td></tr>';
              } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal TIPO DE FACTURA --> 
<div id="modalTipoFactura" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tipo de factura</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <table class="table table-sm table-striped" id="tblTipoFactura" style=" font-size: .8rem">
          <thead>
            <tr>
              <th width="150px">Código</th>      
              <th width="350px">Descripción</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            include "conexion.php";
            $sql = "SELECT * FROM Pruebas15nov16.dbo.IV_EY_PV_CamposUsuario WHERE CampoSAP LIKE 'Tipo_Factura'";
            $consulta = sqlsrv_query($conn, $sql);
            while ($Row = sqlsrv_fetch_array($consulta)) {
              echo $linea = '<tr><td width="150px">' . $Row['Valor'] . '</td>
                            <td width="350px">' . $Row['Descripcion'] . '</td></tr>';
            } ?>
          </tbody>
          </table>
      </div>
    </div>

  </div>
</div>



