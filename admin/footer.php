</div>
	</div>

	<script src="js/jquery-2.2.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/select2.full.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/app.min.js"></script>
	<script src="js/summernote.js"></script>


	<script>
		// la taille des editeur de text
		$(document).ready(function() {
	        $('#editor1').summernote({
	        	height: 200
	        });
	        $('#editor2').summernote({
	        	height: 200
	        });
	    });


		// permet de recuprer_sous_cat dune categorer 
		//en envoyons une requete pour le fichie recuprer_sous_categ.php
		$(".cat").on('change',function(){
			var id=$(this).val();
			var dataString = 'id='+ id;
			$.ajax
			({
				type: "POST",
				url: "../fonctions/recuprer_sous_categ.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
					$(".sous-cat").html(html);
				}
			});			
		});
		
	</script>



	<script>
	  $(function () {

	  	//la forme des tableaux
	    $("#example1").DataTable();
	    $('#example2').DataTable({
	      "paging": true,
	      "lengthChange": false,
	      "searching": false,
	      "ordering": true,
	      "info": true,
	      "autoWidth": false
	    });

	    //la forme de modal
	    $('#confirm-delete').on('show.bs.modal', function(e) {
	      $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
	    });
		
		$('#confirm-approve').on('show.bs.modal', function(e) {
	      $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
	    });
 
	  });
	</script>



	<!-- scripte et jquery pour les photos secondaire trouver sur google -->
	<script type="text/javascript">

        $(document).ready(function () {

            $("#btnAddNew").click(function () {

		        var rowNumber = $("#ProductTable tbody tr").length;

		        var trNew = "";              

		        var addLink = "<div class=\"upload-btn" + rowNumber + "\"><input type=\"file\" name=\"photo[]\"  style=\"margin-bottom:5px;\"></div>";
		           
		        var deleteRow = "<a href=\"javascript:void()\" class=\"Delete btn btn-danger btn-xs\">X</a>";

		        trNew = trNew + "<tr> ";

		        trNew += "<td>" + addLink + "</td>";
		        trNew += "<td style=\"width:28px;\">" + deleteRow + "</td>";

		        trNew = trNew + " </tr>";

		        $("#ProductTable tbody").append(trNew);

		    });

		    $('#ProductTable').delegate('a.Delete', 'click', function () {
		        $(this).parent().parent().fadeOut('slow').remove();
		        return false;
		    });

        });



        var items = [];
        for( i=1; i<=24; i++ ) {
        	items[i] = document.getElementById("tabField"+i);
        }

		items[1].style.display = 'block';
		items[2].style.display = 'block';
		items[3].style.display = 'block';
		items[4].style.display = 'none';

		items[5].style.display = 'block';
		items[6].style.display = 'block';
		items[7].style.display = 'block';
		items[8].style.display = 'none';

		items[9].style.display = 'block';
		items[10].style.display = 'block';
		items[11].style.display = 'block';
		items[12].style.display = 'none';

		items[13].style.display = 'block';
		items[14].style.display = 'block';
		items[15].style.display = 'block';
		items[16].style.display = 'none';

		items[17].style.display = 'block';
		items[18].style.display = 'block';
		items[19].style.display = 'block';
		items[20].style.display = 'none';

		items[21].style.display = 'block';
		items[22].style.display = 'block';
		items[23].style.display = 'block';
		items[24].style.display = 'none';

		function funcTab1(elem) {
			var txt = elem.value;
			if(txt == 'Image Advertisement') {
				items[1].style.display = 'block';
		       	items[2].style.display = 'block';
		       	items[3].style.display = 'block';
		       	items[4].style.display = 'none';
			} 
			if(txt == 'Adsense Code') {
				items[1].style.display = 'none';
		       	items[2].style.display = 'none';
		       	items[3].style.display = 'none';
		       	items[4].style.display = 'block';
			}
		};

		function funcTab2(elem) {
			var txt = elem.value;
			if(txt == 'Image Advertisement') {
				items[5].style.display = 'block';
		       	items[6].style.display = 'block';
		       	items[7].style.display = 'block';
		       	items[8].style.display = 'none';
			} 
			if(txt == 'Adsense Code') {
				items[5].style.display = 'none';
		       	items[6].style.display = 'none';
		       	items[7].style.display = 'none';
		       	items[8].style.display = 'block';
			}
		};

		function funcTab3(elem) {
			var txt = elem.value;
			if(txt == 'Image Advertisement') {
				items[9].style.display = 'block';
		       	items[10].style.display = 'block';
		       	items[11].style.display = 'block';
		       	items[12].style.display = 'none';
			} 
			if(txt == 'Adsense Code') {
				items[9].style.display = 'none';
		       	items[10].style.display = 'none';
		       	items[11].style.display = 'none';
		       	items[12].style.display = 'block';
			}
		};

		function funcTab4(elem) {
			var txt = elem.value;
			if(txt == 'Image Advertisement') {
				items[13].style.display = 'block';
		       	items[14].style.display = 'block';
		       	items[15].style.display = 'block';
		       	items[16].style.display = 'none';
			} 
			if(txt == 'Adsense Code') {
				items[13].style.display = 'none';
		       	items[14].style.display = 'none';
		       	items[15].style.display = 'none';
		       	items[16].style.display = 'block';
			}
		};

		function funcTab5(elem) {
			var txt = elem.value;
			if(txt == 'Image Advertisement') {
				items[17].style.display = 'block';
		       	items[18].style.display = 'block';
		       	items[19].style.display = 'block';
		       	items[20].style.display = 'none';
			} 
			if(txt == 'Adsense Code') {
				items[17].style.display = 'none';
		       	items[18].style.display = 'none';
		       	items[19].style.display = 'none';
		       	items[20].style.display = 'block';
			}
		};

		function funcTab6(elem) {
			var txt = elem.value;
			if(txt == 'Image Advertisement') {
				items[21].style.display = 'block';
		       	items[22].style.display = 'block';
		       	items[23].style.display = 'block';
		       	items[24].style.display = 'none';
			} 
			if(txt == 'Adsense Code') {
				items[21].style.display = 'none';
		       	items[22].style.display = 'none';
		       	items[23].style.display = 'none';
		       	items[24].style.display = 'block';
			}
		};



        
    </script>

</body>
</html>