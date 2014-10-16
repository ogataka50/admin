

	var getParam = function(){
		var from_year = $('#mod_date [name=from_year]').val();
		var from_month = $('#mod_date [name=from_month]').val();
		var from_day = $('#mod_date [name=from_day]').val();
		var to_year = $('#mod_date [name=to_year]').val();
		var to_month = $('#mod_date [name=to_month]').val();
		var to_day = $('#mod_date [name=to_day]').val();

		console.log(from_year);
		console.log(from_month);
		console.log(from_day);

		console.log(to_year);
		console.log(to_month);
		console.log(to_day);

		return {"from_year":from_year, "from_month":from_month, "from_day":from_day, "to_year":to_year, "to_month":to_month, "to_day":to_day};
	}

	var getRowData = function(row){
		return "<tr><td>" + row['date'] + "</td><td>" + row['value_1'] + "</td><td>" + row['value_2'] + "</td><td>" + row['value_3'] + "</td></tr>";
	}

	var getChartData = function(){
		return 	{
			labels: new Array(),
			datasets: [
				{
					label: "My First dataset",
					fillColor: "rgba(220,220,220,0.2)",
					strokeColor: "rgba(220,220,220,1)",
					pointColor: "rgba(220,220,220,1)",
					pointStrokeColor: "#fff",
					pointHighlightFill: "#fff",
					pointHighlightStroke: "rgba(220,220,220,1)",
					data: new Array()
				},
				{
					label: "My Second dataset",
					fillColor: "rgba(151,187,205,0.2)",
					strokeColor: "rgba(151,187,205,1)",
					pointColor: "rgba(151,187,205,1)",
					pointStrokeColor: "#fff",
					pointHighlightFill: "#fff",
					pointHighlightStroke: "rgba(151,187,205,1)",
					data: new Array()
				},
				{
					label: "My Third dataset",
					fillColor: "rgba(151,187,205,0.2)",
					strokeColor: "rgba(151,187,205,1)",
					pointColor: "rgba(151,187,205,1)",
					pointStrokeColor: "#fff",
					pointHighlightFill: "#fff",
					pointHighlightStroke: "rgba(151,187,205,1)",
					data: new Array()
				}
			]
		};
	}

	var modChart = function(){
		var modData = getParam();
		console.log(modData);

		$('#target').find("tr:gt(0)").remove();

		jQuery.ajax({
			url: 'http://133.242.150.177/admin/api_dayly',
			type: "POST",
			dataType: 'json',
			data:modData,
			success: function(res_data){
				chartData = getChartData();
				for(var i = 0; i < res_data.length; i++){
					chartData["datasets"][0]["data"].push(res_data[i]["value_1"]);
					chartData["datasets"][1]["data"].push(res_data[i]["value_2"]);
					chartData["datasets"][2]["data"].push(res_data[i]["value_3"]);
					chartData["labels"].push(res_data[i]["day"] + '日');

					$('#target').append( getRowData(res_data[i]));
					$( '#target tr:last' ).find('td').wrapInner('<div style="display: none;" />');
					$( '#target tr:last' ).find('td > div').slideDown( 500 );
				}

				chartLine = new Chart(document.getElementById("lineChart").getContext("2d")).Line(chartData);
				chartBar = new Chart(document.getElementById("barChart").getContext("2d")).Bar(chartData);
			}
		});
	}


	$("#mod").click(function(){
		chartLine.destroy();
		chartBar.destroy();

		modChart();
		return false;
	});

	modChart();

