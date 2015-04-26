/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$('#country_name').autocomplete({
		      	source: function( request, response ) {
                            
//                            console.log(request.term);
//                            
//                            jQuery.ajax({
////                                type: "GET",
////                                url: 'php/search.php?name_startsWith=' + request.term + "&type=country",
//                                url : 'php/search.php',
//		      			dataType: "json",
//						data: {
//						   name_startsWith: request.term,
//						   type: 'country'
//						},
//
//                            success: function (obj) {
//                                        //console.log("porca madonna");
//                                        console.log(obj);
//                            }
//                            });
                            
		      		$.ajax({
		      			url : 'php/search.php',
		      			dataType: "json",
						data: {
						   name_startsWith: request.term,
						   type: 'country'
						},
                                //type: "GET",
                                //url: 'php/search.php?name_startsWith=' + request.term + "&type=country",
						 success: function( data ) {
							 response( $.map( data, function( item ) {
								return {
									label: item.DESCR_COMUNE,
									value: item.COD_COMUNE,
								}
							}));
						}
		      		});
		      	},
                        select: function( event, ui ) {
                            event.preventDefault();
                            $("#country_name").val(ui.item.label);
                        },
		      	autoFocus: true,
		      	minLength: 0,
                        change: function (event, ui)
                        {
                            window.location.href = "index.php?content=com&cod_com=" + ui.item.value;
                            console.log("cristosi");
                            console.log(event);
                            console.log(ui);
                        }
		      });


