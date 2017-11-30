<?php require_once 'includes/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- BREADCRUMBS -->
            <ol class="breadcrumb bc-3">
                <li class="active">
                    <strong>Home</strong>
                </li>
            </ol>

            <!-- PAGE CONTENT -->
            <div class="row">
                <div class="col-md-12">
                    <hr />
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="well">

                                    <!-- Calendar Body -->
                                    <div class="calendar-body">

                                        <div id="calendar"></div>


                                    </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modal-6">
                <div class="modal-dialog">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Reserved List for <span id="date" style="font-weight:600;"></span></h4>
                        </div>
                        
                        <div class="modal-body">
                            
                                <div class="row">
                                    <table class="table table-bordered datatable" id="event-table">                                 
                                        <tr>
                                            <th class="text-center">Time</th>
                                            <th class="text-center">Event</th>
                                            <th class="text-center">User ID</th>
                                        </tr>
                                        <tr id="table-data">                                                                                       
                                        </tr>
                                    </table>
                            </div>
                            
                            
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modal-8">
                <div class="modal-dialog">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Modal Content is Responsive</h4>
                        </div>
                        
                        <div class="modal-body">
                        
                            <div class="row">
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label for="field-1" class="control-label">Name</label>
                                        
                                        <input type="text" class="form-control" id="field-1" placeholder="John">
                                    </div>	
                                    
                                </div>
                                
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label for="field-2" class="control-label">Surname</label>
                                        
                                        <input type="text" class="form-control" id="field-2" placeholder="Doe">
                                    </div>	
                                
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <div class="form-group">
                                        <label for="field-3" class="control-label">Address</label>
                                        
                                        <input type="text" class="form-control" id="field-3" placeholder="Address">
                                    </div>	
                                    
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="col-md-4">
                                    
                                    <div class="form-group">
                                        <label for="field-4" class="control-label">City</label>
                                        
                                        <input type="text" class="form-control" id="field-4" placeholder="Boston">
                                    </div>	
                                    
                                </div>
                                
                                <div class="col-md-4">
                                    
                                    <div class="form-group">
                                        <label for="field-5" class="control-label">Country</label>
                                        
                                        <input type="text" class="form-control" id="field-5" placeholder="United States">
                                    </div>	
                                
                                </div>
                                
                                <div class="col-md-4">
                                    
                                    <div class="form-group">
                                        <label for="field-6" class="control-label">Zip</label>
                                        
                                        <input type="text" class="form-control" id="field-6" placeholder="123456">
                                    </div>	
                                
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <div class="form-group no-margin">
                                        <label for="field-7" class="control-label">Personal Info</label>
                                        
                                        <textarea class="form-control autogrow" id="field-7" placeholder="Write something about yourself"></textarea>
                                    </div>	
                                    
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-info">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            
            

            <!-- End of PAGE CONTENT -->
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {

        // Get Fresh Events from database
        $.ajax({
            url: 'events.php',
	        type: 'POST', // Send post data
	        data: 'type=fetch',
	        async: false,
            success: function(s){
                json_events = s;
            }
        });

        
        var calendar = $('#calendar').fullCalendar({
            dayClick: function() {
                
                //$('#modal-6').modal('show', {backdrop: 'static'});
                var simpleDate = $(this).data('date')
                var date = new Date($(this).data('date'));
                var titleDate = date.toDateString();
                $('span#date').text(titleDate);
                
                //get events on this day
                $.ajax({
                    url: 'events.php',
                    type: 'POST', // Send post data
                    dataType: "json",
                    data: 'type=getEvent&date=' + $(this).data('date'),
                    async: false,
                    success: function(s){
                        freshevents = s;
                        console.log(s);

                        var modal = document.getElementById("modal-6");
                        var att = document.createAttribute("data-date");
                        att.value = simpleDate;
                        modal.setAttributeNode(att);

                        var tr = document.getElementById("event-table");
                        var tr_attrib = document.createAttribute("data-date");
                        tr_attrib.value = simpleDate;
                        tr.setAttributeNode(tr_attrib);

                        $('div[data-date=' + simpleDate + ']').modal('show', {backdrop: 'static'});
                        //$('#modal-6').modal('show', {backdrop: 'static'});
                        var table;
                        table += '<tr><th class="text-center">Time</th><th class="text-center">Event</th><th class="text-center">User ID</th></tr>';
                        for(var i = 1 ; i <= freshevents.length ; i++){
                            
                            table += '<tr><td class="text-center">time</td><td class="text-center">'+freshevents[0]['title']+'</td><td class="text-center">'+freshevents[0]['user_id']+'</td></tr>';
                            //$('table[data-date=' + simpleDate + ']').html('<tr><td class="text-center">time</td><td class="text-center">'+freshevents[0]['title']+'</td><td class="text-center">'+freshevents[0]['user_id']+'</td></tr>');
                        }
                        $('table[data-date=' + simpleDate + ']').html(table);

                    }
                });
                //$('#calendar').fullCalendar('addEventSource', JSON.parse(freshevents));
                
            },
            events: JSON.parse(json_events),
            header: {
                left: 'title',
                right: 'month,agendaWeek,agendaDay today prev,next'
            }
            
        });

        function getFreshEvents(){
		$.ajax({
			url: 'events.php',
	        type: 'POST', // Send post data
	        data: 'type=fetch',
	        async: false,
	        success: function(s){
                freshevents = s;
                console.log(freshevents);
	        }
		});
		$('#calendar').fullCalendar('addEventSource', JSON.parse(freshevents));
	}
    });
</script>

<?php require_once 'includes/footer.php'?>