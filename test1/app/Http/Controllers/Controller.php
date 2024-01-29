<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function getOntology()
{
	//return 'test';
	//return app_path().'/Http/Controllers/sparqllib.php';
    include(app_path().'/Http/Controllers/sparqllib.php');
    
 
	$db = sparql_connect( "http://localhost:3030/profile/sparql" );
	if( !$db ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }
	sparql_ns( "profile","http://localhost:3030/profile/" );
	
	$sparql = "PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
	PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
	SELECT * WHERE {
	?sub ?pred ?obj .
	} LIMIT 10";
	$result = sparql_query( $sparql ); 
	if( !$result ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }
	
	$fields = sparql_field_array( $result );

	$arr = [];
	$arr2 =[];

	//print "<p>Number of rows: ".sparql_num_rows( $result )." results.</p>";
	//print "<table class='example_table'>";
	//print "<tr>";
	foreach( $fields as $field )
	{
		//print "<th>$field</th>";
	}
	//print "</tr>";
	while( $row = sparql_fetch_array( $result ) )
	{
		//print "<tr>";
		foreach( $fields as $field )
		{
			array_push($arr, $row[$field], $arr2, $row[$field] );
			//print "<td>$row[$field]</td>";
		}
		//print "</tr>";
	}
	//print "</table>";

	//return $arr;
	//return $arr2;
	return view('studPerformance', [ 'stud','results'=> $arr ]);
	}
}
