<html lang="en">
  <head>
    <title>Day Like Today - Admin Panel</title>
    <meta charset="utf-8">
    <meta name="description" content="Day Like Today">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<link href="css/bootstrap.css" rel="stylesheet">
	<link rel="shortcut icon" href="img/Rollback_icon.ico" />
	<link rel="apple-touch-icon" href="img/Rollback_icon.png" />
  </head>

<body>
	<div class="container" 	>
		<div style="width:950px; display: inline-table; text-align:center;	position: relative; 	margin: 10px auto 10px auto;">
			<a href="#"><img class="brand" style="float:left" src="img/logo.png" alt="DayLikeToday"></a>
			<a href="http://gr.okfn.org/en/"><img class="brand" src="img/okfn.png" alt="okfn"></a>
			<a href="http://el.wikipedia.org/"><img class="brand" src="img/wiki.png" alt="wikipedia"></a>
			<a href="http://el.dbpedia.org/"><img class="brand" src="img/dbpedia.png" alt="dbpedia"></a>
		</div>
	</div>
	<div class="container" 	style="border-top: 1px solid #e3e3e3;	border-bottom: 1px solid #e3e3e3;">
		<div style="width:550px;	text-align:center;	position: relative; 	margin: 10px auto 10px auto;">
			<h3> Admin Panel </h3>
		</div>
	</div>
	<div class="container" style="vertical-align:center;width:500px;">
		
		<form method="post" action="" style="width:500px;" class = "form-actions">							
			<div class="clearfix">
				
				<label for="lang"><h4>Select DBpedia</h4></label>
				<select name="lang" >
					<option value="el">Greek</option>
					<option value="en">English</option>
					<option value="de">German</option>
					<option value="fr">French</option>
					<option value="it">Italian</option>
					<option value="es">Spanish</option>
					<option value="pl">Polish</option>
					<option value="ja">Japanese</option>
					<option value="pt">Portuguese</option>					
				</select>
				<br>
				
				<label for="save_all"><h4>Select information to extract</h4></label>
				<div class="input">
					<input type="checkbox" class="checkbox" name="save_all" value="save_all"><b>  Save all<br><br></b>
					
					<input type="checkbox" class="checkbox" name="save_wars" value="save_wars" ><b>  Wars<br></b>
					<input type="checkbox" class="checkbox" name="save_space_missions" value="save_space_missions"><b>  Space missions<br></b>
					<input type="checkbox" class="checkbox" name="save_deaths" value="save_deaths"><b>  Deaths<br></b>
					<input type="checkbox" class="checkbox" name="save_births" value="save_births"><b>  Births<br></b>
					
					<input type="checkbox" class="checkbox" name="save_ships" value="save_ships"><b>  Ships<br></b>
					<input type="checkbox" class="checkbox" name="save_films" value="save_films"><b>  Films<br></b>
					<input type="checkbox" class="checkbox" name="save_cd_singles" value="save_cd_singles"><b>  Cd singles<br></b>
					<input type="checkbox" class="checkbox" name="save_writer_births" value="save_writer_births"><b>  Writer births<br></b>
					
					<input type="checkbox" class="checkbox" name="save_writer_deaths" value="save_writer_deaths"><b>  Writer deaths<br></b>
					<input type="checkbox" class="checkbox" name="save_MusicalArtist_deaths" value="save_MusicalArtist_deaths"><b>  Musical artists deaths<br></b>
					<input type="checkbox" class="checkbox" name="save_MusicalArtist_births" value="save_MusicalArtist_births"><b>  Musical artists births<br></b>
					<input type="checkbox" class="checkbox" name="save_Artist_births" value="save_Artist_births"><b>  Artists births<br></b>
					
					<input type="checkbox" class="checkbox" name="save_Artist_deaths" value="save_Artist_deaths"><b>  Artists deaths<br></b>
					<input type="checkbox" class="checkbox" name="save_Philosopher_births" value="save_Philosopher_births"><b>  Philosophers births<br></b>
					<input type="checkbox" class="checkbox" name="save_Philosopher_deaths" value="save_Philosopher_deaths"><b>  Philosophers deaths<br></b>

				</div>
				
				<br>
				
				<input value="Submit" type="submit" class="btn btn-primary">
			</div>
				
				
		</form>
	</div>
	
<?php
	require_once( "lib/sparqllib.php" );
	set_time_limit(0);
		
	$query_offset_limit = 100;
	$total_records=0;
	$total_time= time();
	$wiki_ontology= "foaf:isPrimaryTopicOf";

	if($_POST['lang']){
		$lang = $_POST['lang'];
		if ($_POST['lang'] != 'en')
			$dbpedia_prefix = $_POST['lang'].".";
		else
			$dbpedia_prefix = "";	
			
		if ($_POST['lang'] == 'el')
			$wiki_ontology= "foaf:page";
	}
	
	if($_POST['save_all']){
		save_wars();
		save_space_missions();
		save_deaths();
		save_births();
		save_ships();
		save_films();
		save_cd_singles();
		save_writer_births();
		save_writer_deaths();
		save_MusicalArtist_deaths();
		save_MusicalArtist_births();
		save_Artist_births();
		save_Artist_deaths();
		save_Philosopher_births();
		save_Philosopher_deaths();	
	}else{
		if($_POST['save_wars']) save_wars();
		if($_POST['save_space_missions']) save_space_missions();
		if($_POST['save_deaths']) save_deaths();
		if($_POST['save_births']) save_births();
		if($_POST['save_ships']) save_ships();
		if($_POST['save_films']) save_films();
		if($_POST['save_cd_singles']) save_cd_singles();
		if($_POST['save_writer_births']) save_writer_births();
		if($_POST['save_writer_deaths']) save_writer_deaths();
		if($_POST['save_MusicalArtist_deaths']) save_MusicalArtist_deaths();
		if($_POST['save_MusicalArtist_births']) save_MusicalArtist_births();
		if($_POST['save_Artist_births']) save_Artist_births();
		if($_POST['save_Artist_deaths']) save_Artist_deaths();
		if($_POST['save_Philosopher_births']) save_Philosopher_births();
		if($_POST['save_Philosopher_deaths']) save_Philosopher_deaths();
	}

	$total_time= time() - $total_time;
	if ($total_time > 0 ){
		print "<div class='container'><table class='table table-striped table-bordered'>";
			print "<tr>";
				print "<th>Statistic</th>";
				print "<th>Value</th>";
			print "</tr>";
			print "<tr>";
				print "<td>New records added</td>";
				print "<td>$total_records</td>";
			print "</tr>";
			print "<tr>";
				print "<td>Total execution time</td>";
				print "<td>$total_time Seconds</td>";
			print "</tr>";
		print "</table></div>";
	}
	

function save_Philosopher_deaths($offset=0){
	$data = sparql_get( 
		"http://".$GLOBALS['dbpedia_prefix']."dbpedia.org/sparql",
		"PREFIX ontology: <http://dbpedia.org/ontology/>
		PREFIX dbpedia: <http://".$GLOBALS['dbpedia_prefix']."dbpedia.org/resource/>
		PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
		PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
		PREFIX foaf:  <http://xmlns.com/foaf/0.1/>

		select distinct ?person ?deathDate ?dbpedia ?wikipedia ?depiction ?comment ?thumbnail
		where {
		?dbpedia rdfs:label ?person; 
				 rdf:type ontology:Philosopher.
		?dbpedia ontology:deathDate ?deathDate.
		OPTIONAL {?dbpedia ".$GLOBALS['wiki_ontology']." ?wikipedia. }
		?dbpedia foaf:depiction ?depiction.
		?dbpedia rdfs:comment ?comment.
		?dbpedia ontology:thumbnail ?thumbnail. 
		FILTER ( lang(?person ) = '".$GLOBALS['lang']."' )
		FILTER ( lang(?comment ) = '".$GLOBALS['lang']."' )
		 } ORDER BY ASC (?deathDate) limit ". $GLOBALS['query_offset_limit']." offset ".$offset."
		" );
	
	//call this function recursive until all records proceded
	if ( count($data) > 0){
		debug($data);			
		foreach( $data as $row )
		{	
			insert_data_to_json($row[deathDate],$row[person],$row[wikipedia],$row[depiction],$row[comment],$row[dbpedia],$row[thumbnail],"Death");
		}
		save_Philosopher_deaths($offset + $GLOBALS['query_offset_limit']);
	}
}

function save_Philosopher_births($offset=0){
	$data = sparql_get( 
		"http://".$GLOBALS['dbpedia_prefix']."dbpedia.org/sparql",
		"PREFIX ontology: <http://dbpedia.org/ontology/>
		PREFIX dbpedia: <http://".$GLOBALS['dbpedia_prefix']."dbpedia.org/resource/>
		PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
		PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
		PREFIX foaf:  <http://xmlns.com/foaf/0.1/>

		select distinct ?person ?birthDate ?dbpedia ?wikipedia ?depiction ?comment ?thumbnail
		where {
		?dbpedia rdfs:label ?person; 
				 rdf:type ontology:Philosopher.
		?dbpedia ontology:birthDate ?birthDate.
		OPTIONAL {?dbpedia ".$GLOBALS['wiki_ontology']." ?wikipedia. }
		?dbpedia foaf:depiction ?depiction.
		?dbpedia rdfs:comment ?comment.
		?dbpedia ontology:thumbnail ?thumbnail. 
		FILTER ( lang(?person ) = '".$GLOBALS['lang']."' )
		FILTER ( lang(?comment ) = '".$GLOBALS['lang']."' )
		 } ORDER BY ASC (?birthDate) limit ". $GLOBALS['query_offset_limit']." offset ".$offset."
		" );
	
	//call this function recursive until all records proceded
	if ( count($data) > 0){
		debug($data);			
		foreach( $data as $row )
		{	
			insert_data_to_json($row[birthDate],$row[person],$row[wikipedia],$row[depiction],$row[comment],$row[dbpedia],$row[thumbnail],"Birth");
		}
		save_Philosopher_births($offset + $GLOBALS['query_offset_limit']);
	}
}
	
function save_Artist_deaths($offset=0){
	$data = sparql_get( 
		"http://".$GLOBALS['dbpedia_prefix']."dbpedia.org/sparql",
		"PREFIX ontology: <http://dbpedia.org/ontology/>
		PREFIX dbpedia: <http://".$GLOBALS['dbpedia_prefix']."dbpedia.org/resource/>
		PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
		PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
		PREFIX foaf:  <http://xmlns.com/foaf/0.1/>

		select distinct ?person ?deathDate ?dbpedia ?wikipedia ?depiction ?comment ?thumbnail
		where {
		?dbpedia rdfs:label ?person; 
				 rdf:type ontology:Artist.
		?dbpedia ontology:deathDate ?deathDate.
		OPTIONAL {?dbpedia ".$GLOBALS['wiki_ontology']." ?wikipedia. }
		?dbpedia foaf:depiction ?depiction.
		?dbpedia rdfs:comment ?comment.
		?dbpedia ontology:thumbnail ?thumbnail. 
		FILTER ( lang(?person ) = '".$GLOBALS['lang']."' )
		FILTER ( lang(?comment ) = '".$GLOBALS['lang']."' )
		 } ORDER BY ASC (?deathDate) limit ". $GLOBALS['query_offset_limit']." offset ".$offset."
		" );
	
	//call this function recursive until all records proceded
	if ( count($data) > 0){
		debug($data);			
		foreach( $data as $row )
		{	
			insert_data_to_json($row[deathDate],$row[person],$row[wikipedia],$row[depiction],$row[comment],$row[dbpedia],$row[thumbnail],"Death");
		}
		save_Artist_deaths($offset + $GLOBALS['query_offset_limit']);
	}
}

function save_Artist_births($offset=0){
	$data = sparql_get( 
		"http://".$GLOBALS['dbpedia_prefix']."dbpedia.org/sparql",
		"PREFIX ontology: <http://dbpedia.org/ontology/>
		PREFIX dbpedia: <http://".$GLOBALS['dbpedia_prefix']."dbpedia.org/resource/>
		PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
		PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
		PREFIX foaf:  <http://xmlns.com/foaf/0.1/>

		select distinct ?person ?birthDate ?dbpedia ?wikipedia ?depiction ?comment ?thumbnail
		where {
		?dbpedia rdfs:label ?person; 
				 rdf:type ontology:Artist.
		?dbpedia ontology:birthDate ?birthDate.
		OPTIONAL {?dbpedia ".$GLOBALS['wiki_ontology']." ?wikipedia. }
		?dbpedia foaf:depiction ?depiction.
		?dbpedia rdfs:comment ?comment.
		?dbpedia ontology:thumbnail ?thumbnail. 
		FILTER ( lang(?person ) = '".$GLOBALS['lang']."' )
		FILTER ( lang(?comment ) = '".$GLOBALS['lang']."' )
		 } ORDER BY ASC (?birthDate) limit ". $GLOBALS['query_offset_limit']." offset ".$offset."
		" );
	
	//call this function recursive until all records proceded
	if ( count($data) > 0){
		debug($data);			
		foreach( $data as $row )
		{	
			insert_data_to_json($row[birthDate],$row[person],$row[wikipedia],$row[depiction],$row[comment],$row[dbpedia],$row[thumbnail],"Birth");
		}
		save_Artist_births($offset + $GLOBALS['query_offset_limit']);
	}
}
	
	

function save_MusicalArtist_deaths($offset=0){
	$data = sparql_get( 
		"http://".$GLOBALS['dbpedia_prefix']."dbpedia.org/sparql",
		"PREFIX ontology: <http://dbpedia.org/ontology/>
		PREFIX dbpedia: <http://".$GLOBALS['dbpedia_prefix']."dbpedia.org/resource/>
		PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
		PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
		PREFIX foaf:  <http://xmlns.com/foaf/0.1/>

		select distinct ?person ?deathDate ?dbpedia ?wikipedia ?depiction ?comment ?thumbnail
		where {
		?dbpedia rdfs:label ?person; 
				 rdf:type ontology:MusicalArtist.
		?dbpedia ontology:deathDate ?deathDate.
		OPTIONAL {?dbpedia ".$GLOBALS['wiki_ontology']." ?wikipedia. }
		?dbpedia foaf:depiction ?depiction.
		?dbpedia rdfs:comment ?comment.
		?dbpedia ontology:thumbnail ?thumbnail. 
		FILTER ( lang(?person ) = '".$GLOBALS['lang']."' )
		FILTER ( lang(?comment ) = '".$GLOBALS['lang']."' )
		 } ORDER BY ASC (?deathDate) limit ". $GLOBALS['query_offset_limit']." offset ".$offset."
		" );
	
	//call this function recursive until all records proceded
	if ( count($data) > 0){
		debug($data);			
		foreach( $data as $row )
		{	
			insert_data_to_json($row[deathDate],$row[person],$row[wikipedia],$row[depiction],$row[comment],$row[dbpedia],$row[thumbnail],"Death");
		}
		save_MusicalArtist_deaths($offset + $GLOBALS['query_offset_limit']);
	}
}

function save_MusicalArtist_births($offset=0){
	$data = sparql_get( 
		"http://".$GLOBALS['dbpedia_prefix']."dbpedia.org/sparql",
		"PREFIX ontology: <http://dbpedia.org/ontology/>
		PREFIX dbpedia: <http://".$GLOBALS['dbpedia_prefix']."dbpedia.org/resource/>
		PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
		PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
		PREFIX foaf:  <http://xmlns.com/foaf/0.1/>

		select distinct ?person ?birthDate ?dbpedia ?wikipedia ?depiction ?comment ?thumbnail
		where {
		?dbpedia rdfs:label ?person; 
				 rdf:type ontology:MusicalArtist.
		?dbpedia ontology:birthDate ?birthDate.
		OPTIONAL {?dbpedia ".$GLOBALS['wiki_ontology']." ?wikipedia. }
		?dbpedia foaf:depiction ?depiction.
		?dbpedia rdfs:comment ?comment.
		?dbpedia ontology:thumbnail ?thumbnail. 
		FILTER ( lang(?person ) = '".$GLOBALS['lang']."' )
		FILTER ( lang(?comment ) = '".$GLOBALS['lang']."' )
		 } ORDER BY ASC (?birthDate) limit ". $GLOBALS['query_offset_limit']." offset ".$offset."
		" );
	
	//call this function recursive until all records proceded
	if ( count($data) > 0){
		debug($data);			
		foreach( $data as $row )
		{	
			insert_data_to_json($row[birthDate],$row[person],$row[wikipedia],$row[depiction],$row[comment],$row[dbpedia],$row[thumbnail],"Birth");
		}
		save_MusicalArtist_births($offset + $GLOBALS['query_offset_limit']);
	}
}
	


function save_writer_deaths($offset=0){
	$data = sparql_get( 
		"http://".$GLOBALS['dbpedia_prefix']."dbpedia.org/sparql",
		"PREFIX ontology: <http://dbpedia.org/ontology/>
		PREFIX dbpedia: <http://".$GLOBALS['dbpedia_prefix']."dbpedia.org/resource/>
		PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
		PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
		PREFIX foaf:  <http://xmlns.com/foaf/0.1/>

		select distinct ?person ?deathDate ?dbpedia ?wikipedia ?depiction ?comment ?thumbnail
		where {
		?dbpedia rdfs:label ?person; 
				 rdf:type ontology:Writer.
		?dbpedia ontology:deathDate ?deathDate.
		OPTIONAL {?dbpedia ".$GLOBALS['wiki_ontology']." ?wikipedia. }
		?dbpedia foaf:depiction ?depiction.
		?dbpedia rdfs:comment ?comment.
		?dbpedia ontology:thumbnail ?thumbnail. 
		FILTER ( lang(?person ) = '".$GLOBALS['lang']."' )
		FILTER ( lang(?comment ) = '".$GLOBALS['lang']."' )
		 } ORDER BY ASC (?deathDate) limit ". $GLOBALS['query_offset_limit']." offset ".$offset."
		" );
	
	//call this function recursive until all records proceded
	if ( count($data) > 0){
		debug($data);			
		foreach( $data as $row )
		{	
			insert_data_to_json($row[deathDate],$row[person],$row[wikipedia],$row[depiction],$row[comment],$row[dbpedia],$row[thumbnail],"Death");
		}
		save_writer_deaths($offset + $GLOBALS['query_offset_limit']);
	}
}

function save_writer_births($offset=0){
	$data = sparql_get( 
		"http://".$GLOBALS['dbpedia_prefix']."dbpedia.org/sparql",
		"PREFIX ontology: <http://dbpedia.org/ontology/>
		PREFIX dbpedia: <http://".$GLOBALS['dbpedia_prefix']."dbpedia.org/resource/>
		PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
		PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
		PREFIX foaf:  <http://xmlns.com/foaf/0.1/>

		select distinct ?person ?birthDate ?dbpedia ?wikipedia ?depiction ?comment ?thumbnail
		where {
		?dbpedia rdfs:label ?person; 
				 rdf:type ontology:Writer.
		?dbpedia ontology:birthDate ?birthDate.
		OPTIONAL {?dbpedia ".$GLOBALS['wiki_ontology']." ?wikipedia. }
		?dbpedia foaf:depiction ?depiction.
		?dbpedia rdfs:comment ?comment.
		?dbpedia ontology:thumbnail ?thumbnail.
		FILTER ( lang(?person ) = '".$GLOBALS['lang']."' )
		FILTER ( lang(?comment ) = '".$GLOBALS['lang']."' ) 
		 } ORDER BY ASC (?birthDate) limit ". $GLOBALS['query_offset_limit']." offset ".$offset."
		" );
		
	//call this function recursive until all records proceded
	if ( count($data) > 0){
		debug($data);			
		foreach( $data as $row )
		{	
			insert_data_to_json($row[birthDate],$row[person],$row[wikipedia],$row[depiction],$row[comment],$row[dbpedia],$row[thumbnail],"Birth");
		}
		save_writer_births($offset + $GLOBALS['query_offset_limit']);
	}
}

	
	
function save_cd_singles($offset=0){
	$data = sparql_get( 
		"http://".$GLOBALS['dbpedia_prefix']."dbpedia.org/sparql",
		"PREFIX dbpedia: <http://".$GLOBALS['dbpedia_prefix']."dbpedia.org/resource/>
		PREFIX ontology: <http://dbpedia.org/ontology/>		
		PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
		PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
		PREFIX foaf:  <http://xmlns.com/foaf/0.1/>

		select distinct ?name ?releaseDate ?dbpedia ?wikipedia ?depiction ?comment ?thumbnail
		where {
		?dbpedia rdfs:label ?name; 
				 rdf:type ontology:Single.
		OPTIONAL {?dbpedia ".$GLOBALS['wiki_ontology']." ?wikipedia.}
		?dbpedia ontology:releaseDate ?releaseDate.
		?dbpedia foaf:depiction ?depiction.
		?dbpedia rdfs:comment ?comment.
		?dbpedia ontology:thumbnail ?thumbnail.
		FILTER ( lang(?name ) = '".$GLOBALS['lang']."' )
		FILTER ( lang(?comment ) = '".$GLOBALS['lang']."' )		
		}ORDER BY ASC (?releaseDate) limit ". $GLOBALS['query_offset_limit']." offset ".$offset."
			
		" );
	//call this function recursive until all records proceded
	if ( count($data) > 0){
		debug($data);			
		foreach( $data as $row )
		{	
			insert_data_to_json($row[releaseDate],$row[name],$row[wikipedia],$row[depiction],$row[comment],$row[dbpedia],$row[thumbnail],"Cd Single");
		}
		save_cd_singles($offset + $GLOBALS['query_offset_limit']);
	}
}		
	
	
function save_films($offset=0){
	$data = sparql_get( 
		"http://".$GLOBALS['dbpedia_prefix']."dbpedia.org/sparql",
		"PREFIX dbpedia: <http://".$GLOBALS['dbpedia_prefix']."dbpedia.org/resource/>
		PREFIX ontology: <http://dbpedia.org/ontology/>
		PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
		PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
		PREFIX dbpedia-owl: <http://dbpedia.org/ontology/>
		PREFIX foaf: <http://xmlns.com/foaf/0.1/>

		select distinct ?name ?releaseDate ?dbpedia ?wikipedia ?depiction ?comment ?thumbnail
		where { 
		?dbpedia foaf:name ?name ; 
		rdf:type ontology:Film.
		OPTIONAL {?dbpedia ".$GLOBALS['wiki_ontology']." ?wikipedia.}
		?dbpedia dbpedia-owl:releaseDate ?releaseDate.
		?dbpedia foaf:depiction ?depiction.
		?dbpedia rdfs:comment ?comment.
		?dbpedia ontology:thumbnail ?thumbnail. 
		FILTER ( lang(?name ) = '".$GLOBALS['lang']."' )
		FILTER ( lang(?comment ) = '".$GLOBALS['lang']."' )
		} ORDER BY ASC (?releaseDate ) limit ". $GLOBALS['query_offset_limit']." offset ".$offset."
			
		" );
	//call this function recursive until all records proceded
	if ( count($data) > 0){
		debug($data);			
		foreach( $data as $row )
		{	
			insert_data_to_json($row[releaseDate],$row[name],$row[wikipedia],$row[depiction],$row[comment],$row[dbpedia],$row[thumbnail],"Film");
		}
		save_films($offset + $GLOBALS['query_offset_limit']);
	}
}	

function save_ships($offset=0){
	$data = sparql_get( 
		"http://".$GLOBALS['dbpedia_prefix']."dbpedia.org/sparql",
		"PREFIX dbpedia: <http://".$GLOBALS['dbpedia_prefix']."dbpedia.org/resource/>
		PREFIX ontology: <http://dbpedia.org/ontology/>
		PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
		PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
		PREFIX dbpedia-owl: <http://dbpedia.org/ontology/>
		PREFIX foaf: <http://xmlns.com/foaf/0.1/>

		select distinct ?name ?shipLaunch ?dbpedia ?wikipedia ?depiction ?comment ?thumbnail
		where { 
		?dbpedia rdfs:label ?name ; 
		rdf:type ontology:Ship.
		OPTIONAL {?dbpedia ".$GLOBALS['wiki_ontology']." ?wikipedia.}
		?dbpedia dbpedia-owl:shipLaunch ?shipLaunch.
		?dbpedia foaf:depiction ?depiction.
		?dbpedia rdfs:comment ?comment.
		?dbpedia ontology:thumbnail ?thumbnail. 
		FILTER ( lang(?name ) = '".$GLOBALS['lang']."' )
		FILTER ( lang(?comment ) = '".$GLOBALS['lang']."' )
		} ORDER BY ASC (?shipLaunch ) limit ". $GLOBALS['query_offset_limit']." offset ".$offset."
			
		" );
	//call this function recursive until all records proceded
	if ( count($data) > 0){
		debug($data);			
		foreach( $data as $row )
		{	
			insert_data_to_json($row[shipLaunch],$row[name],$row[wikipedia],$row[depiction],$row[comment],$row[dbpedia],$row[thumbnail],"Ship launch");
		}
		save_ships($offset + $GLOBALS['query_offset_limit']);
	}
}
	
function save_wars($offset=0){
	$data = sparql_get( 
		"http://".$GLOBALS['dbpedia_prefix']."dbpedia.org/sparql",
		"PREFIX dbpedia: <http://".$GLOBALS['dbpedia_prefix']."dbpedia.org/resource/>
		PREFIX ontology: <http://dbpedia.org/ontology/>
		PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
		PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
		PREFIX dbpedia-owl: <http://dbpedia.org/ontology/>
		PREFIX foaf: <http://xmlns.com/foaf/0.1/>

		select distinct ?war ?date ?dbpedia ?wikipedia ?depiction ?comment ?thumbnail
		where { 
		?dbpedia rdfs:label ?war; 
		rdf:type dbpedia-owl:MilitaryConflict.
		OPTIONAL {?dbpedia ".$GLOBALS['wiki_ontology']." ?wikipedia.}
		?dbpedia dbpedia-owl:date ?date. 
		?dbpedia foaf:depiction ?depiction.
		?dbpedia rdfs:comment ?comment.
		?dbpedia ontology:thumbnail ?thumbnail.
		FILTER ( lang(?war ) = '".$GLOBALS['lang']."' )
		FILTER ( lang(?comment ) = '".$GLOBALS['lang']."' )
		} ORDER BY ASC (?date) limit ". $GLOBALS['query_offset_limit']." offset ".$offset."
			
		" );
	//call this function recursive until all records proceded
	if ( count($data) > 0){
		debug($data);			
		foreach( $data as $row )
		{	
			insert_data_to_json($row[date],$row[war],$row[wikipedia],$row[depiction],$row[comment],$row[dbpedia],$row[thumbnail],"War");
		}
		save_wars($offset + $GLOBALS['query_offset_limit']);
	}
}
	
function save_space_missions($offset=0){
	$data = sparql_get( 
		"http://".$GLOBALS['dbpedia_prefix']."dbpedia.org/sparql",
		"PREFIX dbpedia: <http://".$GLOBALS['dbpedia_prefix']."dbpedia.org/resource/>
		PREFIX ontology: <http://dbpedia.org/ontology/>
		PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
		PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
		PREFIX dbpedia-owl: <http://dbpedia.org/ontology/>
		PREFIX foaf: <http://xmlns.com/foaf/0.1/>

		select distinct ?spacecraft ?launchdate ?dbpedia ?wikipedia ?depiction ?comment ?thumbnail
		where { 
		?dbpedia rdfs:label ?spacecraft; 
		rdf:type ontology:SpaceMission.
		OPTIONAL {?dbpedia ".$GLOBALS['wiki_ontology']." ?wikipedia.}
		?dbpedia dbpedia-owl:launchDate ?launchdate.
		?dbpedia foaf:depiction ?depiction.
		?dbpedia rdfs:comment ?comment.
		?dbpedia ontology:thumbnail ?thumbnail.
		FILTER ( lang(?spacecraft ) = '".$GLOBALS['lang']."' )
		FILTER ( lang(?comment ) = '".$GLOBALS['lang']."' )
		} ORDER BY ASC (?launchdate) limit ". $GLOBALS['query_offset_limit']." offset ".$offset."

		" );
	//call this function recursive until all records proceded
	if ( count($data) > 0){
		debug($data);			
		foreach( $data as $row )
		{	
			insert_data_to_json($row[launchdate],$row[spacecraft],$row[wikipedia],$row[depiction],$row[comment],$row[dbpedia],$row[thumbnail],"Space mission");
		}
		save_space_missions($offset + $GLOBALS['query_offset_limit']);
	}
}

function save_deaths($offset=0){
	$data = sparql_get( 
		"http://".$GLOBALS['dbpedia_prefix']."dbpedia.org/sparql",
		"PREFIX ontology: <http://dbpedia.org/ontology/>
		PREFIX dbpedia: <http://".$GLOBALS['dbpedia_prefix']."dbpedia.org/resource/>
		PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
		PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
		PREFIX foaf:  <http://xmlns.com/foaf/0.1/>

		select distinct ?person ?deathDate ?dbpedia ?wikipedia ?depiction ?comment ?thumbnail
		where {
		?dbpedia rdfs:label ?person; 
				 rdf:type ontology:Person.
		?dbpedia ontology:deathDate ?deathDate.
		OPTIONAL {?dbpedia ".$GLOBALS['wiki_ontology']." ?wikipedia. }
		?dbpedia foaf:depiction ?depiction.
		?dbpedia rdfs:comment ?comment.
		?dbpedia ontology:thumbnail ?thumbnail.
		FILTER ( lang(?person ) = '".$GLOBALS['lang']."' )
		FILTER ( lang(?comment ) = '".$GLOBALS['lang']."' )
		
		 } ORDER BY ASC (?deathDate) limit ". $GLOBALS['query_offset_limit']." offset ".$offset."
		" );
		
	//call this function recursive until all records proceded
	if ( count($data) > 0){
		debug($data);			
		foreach( $data as $row )
		{	
			insert_data_to_json($row[deathDate],$row[person],$row[wikipedia],$row[depiction],$row[comment],$row[dbpedia],$row[thumbnail],"Death");
		}
		save_deaths($offset + $GLOBALS['query_offset_limit']);
	}
	
}

function save_births($offset=0){
	$data = sparql_get( 
		"http://".$GLOBALS['dbpedia_prefix']."dbpedia.org/sparql",
		"PREFIX ontology: <http://dbpedia.org/ontology/>
		
		PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
		PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
		PREFIX foaf:  <http://xmlns.com/foaf/0.1/>

		select distinct ?person ?birthDate ?dbpedia ?wikipedia ?depiction ?comment ?thumbnail
		where {
		?dbpedia rdfs:label ?person; 
				 rdf:type ontology:Person.
		?dbpedia ontology:birthDate ?birthDate.
		OPTIONAL {?dbpedia ".$GLOBALS['wiki_ontology']." ?wikipedia. }
		?dbpedia foaf:depiction ?depiction.
		?dbpedia rdfs:comment ?comment.
		?dbpedia ontology:thumbnail ?thumbnail.
		FILTER ( lang(?person ) = '".$GLOBALS['lang']."' )
		FILTER ( lang(?comment ) = '".$GLOBALS['lang']."' )
		 } ORDER BY ASC (?birthDate) limit ". $GLOBALS['query_offset_limit']." offset ".$offset."
		" );
	
	//call this function recursive until all records proceded
	if ( count($data) > 0){
		debug($data);			
		foreach( $data as $row )
		{	
			insert_data_to_json($row[birthDate],$row[person],$row[wikipedia],$row[depiction],$row[comment],$row[dbpedia],$row[thumbnail],"Birth");
		}
		save_births($offset + $GLOBALS['query_offset_limit']);
	}
}

function insert_data_to_json($date,$name,$wikipedia,$picture,$comment,$dbpedia,$thumb,$tag){
	
	if (substr_count($date, '-')==2){
		$pieces = explode("-", $date);
		$year = $pieces[0];
		$month = $pieces[1];
		$day = $pieces[2];
		$year = intval($year);
	}else{
		$pieces = explode("-", $date);
		$year = $pieces[1];
		$month = $pieces[2];
		$day = $pieces[3];
		$year = (-1)*intval($year);
	}

	$filename="./json/".$GLOBALS['lang']."/".$day."_".$month.".json";
	
	
	$init_data = array("timeline"=>array("headline"=>"A day like today. <b>$day-$month</b>","type"=>"default","text"=>"See what happened a day like today with data from Wikipedia and DBpedia!","date"=>array()));
		
	$found=false;
	if(file_exists($filename)){
		$str_data = file_get_contents($filename);
		$data = json_decode($str_data,true);
		foreach ($data["timeline"]["date"] as $temp)
		{
			if ($temp["dbpedia"] == $dbpedia){
				$found=true;
			}	
		}
	}else{
		if (!file_exists("./json/".$GLOBALS['lang']."/"))
			mkdir("./json/".$GLOBALS['lang']."/");
		$data = $init_data;	
		$found=false;		
	}
	
	if(!$found){
		$header_response = get_headers($picture, 1);
		if(strpos( $header_response[0], "404" ) !== false){
			$header_response = get_headers($thumb, 1);
			if(strpos( $header_response[0], "404" ) !== false)
				$picture ="img/no_image_available.png";
			else
				$picture = $thumb;
		}
		$date_record= array("startDate"=>"$year,$month,$day", "dbpedia"=>$dbpedia, "headline"=>"$name ($tag)","text"=>"<p style='text-align: justify;'>$comment <br><br><a href='$wikipedia' target='_blank'>Read more...</a><br><a href='$dbpedia' target='_blank'>Take a look at DBpedia...</a></p>","asset"=>array("media"=>$picture,"credit"=>"","caption"=>$name,"thumbnail"=>$thumb));
		array_push($data["timeline"]["date"],$date_record);

		$fh = fopen($filename, 'w') or die("Error opening output file");
		fwrite($fh, json_encode($data,JSON_UNESCAPED_UNICODE));
		fclose($fh);
		$GLOBALS['total_records']++;
	}
	
}

function debug($data){
	if( !isset($data) )
	{
		print "<p>Error: ".sparql_errno().": ".sparql_error()."</p>";
	}else{
	
		print "<div class='container'><table class='table table-striped table-bordered'>";
		print "<tr>";
		foreach( $data->fields() as $field )
		{
			print "<th>$field</th>";
		}
		print "</tr>";
		foreach( $data as $row )
		{
			print "<tr>";
			foreach( $data->fields() as $field )
			{
				if ( !in_array($field,array("dbpedia","wikipedia","depiction","comment","thumbnail"))){
					print "<td>$row[$field]</td>";
				}else{
					if ($row[$field]!=""){
							print '<td><a rel="popover" data-content="'.$row[$field].'"><i class="icon-ok"></i></a>';
							if ($field != "comment") print '    <a href="'.$row[$field].'" target="_blank"><i class="icon-play"></i></a>';
							print '</td>';
						
						}
					else
						print '<td><i class="icon-remove"></i></td>';
				}
			}
			print "</tr>";
		}
		print "</table></div>";
	}

}
?>


    <!-- HTML5 shim, for IE6-8 support of HTML elements--><!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap-twipsy.js"></script>
    <script src="./js/bootstrap-popover.js"></script>
    <script type="text/javascript">
        (function() {
            $("[rel=popover]").popover();
        })();
    </script>


</body>
</html>