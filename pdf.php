<?php
require_once ("dompdf/dompdf_config.inc.php");
require_once ("PHP/clases/Pedido.php");
$dompdf = new DOMPDF ();

$listado = Pedido::TraerTodosLosPedidos ();

$html = "<table class='table table-hover table-bordered text-center' border='1'>
	<thead>
		<tr>
			<th>Numero</th>
			<th>Fecha</th>
			<th>Legajo Vendedor</th>
			<th>Estado</th>
			<th>IdBomba</th>
			<th>Cantidad</th>
			<th>Direccion</th>
		</tr>
	</thead>
	<tbody>";

foreach ( $listado as $l ) {
	$html .= "<tr>
		<td>" . $l->GetId () . "</td>
		<td>" . $l->GetFecha () . "</td>
		<td>" . $l->GetLegajovendedor () . "</td>
		<td>" . $l->GetEstado () . "</td>
		<td>" . $l->GetIdbomba () . "</td>
		<td>" . $l->GetCantidad () . "</td>
		<td>" . $l->GetDireccion () . "</td>
			</tr>";
}

$html .= "</tbody></table>";

$dompdf->load_html ( $html );
$dompdf->render ();
$dompdf->stream ( "pedidos.pdf" );
?>