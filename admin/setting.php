<?php require_once 'includes/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- BREADCRUMBS -->
            <ol class="breadcrumb bc-3">
                <li>
                    <a href="index.php">
                        <i class="fa-home"></i>Home</a>
                </li>
                <li>
                    <a href="reservation-settings.php">
                        <i class="fa-home"></i>Reservation Setting</a>
                </li>
                <li class="active">
                    <strong>Reservations</strong>
                </li>
            </ol>

            <!-- PAGE CONTENT -->
            <div class="row">
                <div class="col-md-12">
                    <hr />
                    <h2>Settings for Barangay --- Court</h2>

                    <br />
                    <div class="panel panel-primary">
		
			<div class="panel-heading">
				<div class="panel-title">Settings</div>
			</div>
		
			<div class="panel-body">
		
				<form >
		
					<div class="form-group">
						<label class="control-label">Required Field + Custom Message</label>
		
						<input type="text" class="form-control" name="name" data-validate="required" data-message-required="This is custom message for required field." placeholder="Required Field" />
					</div>
		
					<div class="form-group">
						<label class="control-label">Email Field</label>
		
						<input type="text" class="form-control" name="email" data-validate="email" placeholder="Email Field" />
					</div>
		
					<div class="form-group">
						<label class="control-label">Input Min Field</label>
		
						<input type="text" class="form-control" name="min_field" data-validate="number,minlength[4]" placeholder="Numeric + Minimun Length Field" />
					</div>
		
					<div class="form-group">
						<label class="control-label">Input Max Field</label>
		
						<input type="text" class="form-control" name="max_field" data-validate="maxlength[2]" placeholder="Maximum Length Field" />
					</div>
		
					<div class="form-group">
						<label class="control-label">Numeric Field</label>
		
						<input type="text" class="form-control" name="number" data-validate="number" placeholder="Numeric Field" />
					</div>
		
					<div class="form-group">
						<label class="control-label">URL Field</label>
		
						<input type="text" class="form-control" name="url" data-validate="required,url" placeholder="URL" />
					</div>
		
					<div class="form-group">
						<label class="control-label">Credit Card Field</label>
		
						<input type="text" class="form-control" name="creditcard" data-validate="required,creditcard" placeholder="Credit Card" />
					</div>
		
					<div class="form-group">
						<button type="submit" class="btn btn-success">Validate</button>
						<button type="reset" class="btn">Reset</button>
					</div>
		
				</form>
		
			</div>
		
		</div>
                    
                        
                </div>
            </div>

            <!-- End of PAGE CONTENT -->
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'?>