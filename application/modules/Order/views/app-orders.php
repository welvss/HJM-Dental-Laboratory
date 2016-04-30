
		<div class="callout fixed title-callout" style="background: #f7f9fb;">
			<div class="row expanded">
				<div class="large-8 small-12 columns">
					<div class="row">
							<div class="medium-12 columns">
									<h4><i class="fa fa-pencil-square-o fa-lg"></i><strong>Orders</strong></h4>
							</div>
					</div>
				</div>
				<div class="large-4 small-12 columns">
					<div class="row">
							<a class="button hvr-icon-hang float-right" data-open="order-modal">Add New Order</a>
							<div class="small reveal" id="order-modal" data-reveal>
								<h3><i class="fa fa-pencil-square-o"></i><strong>New Case</strong></h3>
								<hr>
								<form>
									<div class="row">
										 <div class="small-2 columns">
										  <label for="right-label" class="text-right middle"><strong>Dentist:</strong></label>
										</div>
										<div class="medium-4 small-12 columns end">
										    <select name="dentist">
												<option value="husker">Dr. Welvin Medina</option>
												<option value="starbuck">Dr. John Gabriel Bagacina</option>
												<option value="hotdog">Dr. Prince Kenneth Rufino</option>
												<option value="apollo">Dr. Ralph Pagayon</option>
											</select>
										</div>
									</div>
									<div class="row">
										 <div class="small-2 columns">
										  <label for="right-label" class="text-right middle"><strong>Patient:</strong></label>
										</div>
										<div class="medium-4 small-12 columns end">
										    <input type="text" name="patient" >
										</div>
									</div>
									<div class="row">
										 <div class="medium-2 small-3 columns">
										  <label for="right-label" class="text-right middle"><strong>Due Date:</strong></label>
										</div>
										<div class="medium-4 small-12 columns end">
										    <input type="date" name="due-date" required>
										</div>
									</div>
									<div class="row">
										 <div class="medium-2 small-3 columns">
										  <label for="right-label" class="text-right middle"><strong>Due Time:</strong></label>
										</div>
										<div class="medium-4 small-12 columns end">
										    <input type="time" name="due-time">
										</div>
									</div>
									<div class="row">
										 <div class="small-2 columns">
										  <label for="right-label" class="text-right middle"><strong>Gender:</strong></label>
										</div>
										<div class="medium-3 small-12 columns end">
										    <input type="text" name="gender">
										</div>
									</div>
									<div class="row">
										 <div class="small-2 columns">
										  <label for="right-label" class="text-right middle"><strong>Age:</strong></label>
										</div>
										<div class="medium-3 small-12 columns end">
										    <input type="text" name="age">
										</div>
									</div>
									<div class="row">
										 <div class="small-2 columns">
										  <label for="right-label" class="text-right middle"><strong>Shade:</strong></label>
										</div>
										<div class="medium-3 small-12 columns end">
										    <input type="text" name="shade">
										</div>
									</div>
									<div class="row">
										 <div class="small-2 columns">
										  <label for="right-label" class="text-right middle"><strong>Crown:</strong></label>
										</div>
										<div class="medium-3 small-12 columns end">
										    <a href="#">[+] Add a crown or bridge</a>
										</div>
									</div>
									<div class="row">
										 <div class="small-2 columns">
										  <label for="right-label" class="text-right middle"><strong>Notes:</strong></label>
										</div>
										<div class="medium-9 small-12 columns end">
										  <textarea name="notes" id="" cols="30" rows="5" required></textarea>
										</div>
									</div>
									<div class="row">
										 <div class="small-2 columns">
										  <label for="right-label" class="text-right middle"><strong>Attachment:</strong></label>
										</div>
										<div class="medium-3 small-12 columns end">
									    <label for="exampleFileUpload" class="button">Upload File</label>
										    <input name="file" type="file" id="exampleFileUpload" class="show-for-sr" required>
										</div>
									</div>
									<hr>
									<div class="row">
										<fieldset class="float-left">
										  <button class="button alert hvr-icon-back" data-close aria-label="Close modal" type="button">Cancel</button>
										</fieldset>
										<fieldset class="float-right">
										  <button class="button success hvr-icon-forward" type="Submit" value="Submit">Submit Order</button>
										</fieldset>
									</div>
								</form>
									<button class="close-button" data-close aria-label="Close modal" type="button">
									<span aria-hidden="true">&times;</span>
								  </button>
							</div>
					</div>
				</div>
			</div>
		</div>
		<!--Body Content-->
		<div class="app-body-content">
		<ul class="order-nav dropdown menu" data-dropdown-menu>
					<li><a href="#"><i class="fa fa-print"></i>Print Items</a></li>
					<li class=".is-dropdown-submenu-parent">
					<a href="#"><i class="fa fa-bullseye"></i>Mark As</a>
					  <ul class="menu">
						  <li><a href="#" id="new-order">New</a></li>
						  <li><a href="#" id="inProd-order">In Production</a></li>
						  <li><a href="#" id="complete-order">Complete</a></li>
						  <li><a href="#" id="hold-order">Hold</a></li>
					 </ul>
					</li>
				</ul>
			<div class="row expanded">
				<div class="column medium-12 medium-order-2 large-10 large-order-1">
		<table id="example" class="display responsive" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th></th>
							<th>Invoice</th>
							<th>Company</th>
							<th>Patient</th>
							<th><center>Ordered Date</cente></th>
							<th><center>Due Date</center></th>
							<th>Status</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
					$ctr=1;
					foreach($cases as $case)
					{
						foreach($dentists as $dentist)
						{
							
							if($case->DentistID==$dentist->DentistID)
							{
								echo
								'<tr>
									<td></td>
									<td>'.$ctr.'</td>
									<td>'.$dentist->company.'</td>
									<td>'.$case->patient.'</td>
									<td><input type="datetime-local" name="due-date" readonly value="'.date('Y-m-d\TH:i', strtotime($case->orderdatetime)).'" style="width:231px;"></td>
									<td><input type="datetime-local" name="due-date" readonly value="'.$case->duedate.'T'.$case->duetime.'" style="width:231px;"></td>
									<td>
									<select name="status" class="status-box">
										<option selected="new">New</option>
										<option value="starbuck">In Production </option>
										<option value="hotdog">Complete</option>
										<option value="apollo">On Hold</option>
									</select>
									</td>
									<td><a href="#">Lab Slip</a></td>
									<td><a href="#">Edit</a></td>
								</tr>';
								$ctr++;
							}
						}
					}
					
					?>
					</tbody>
				</table>
				</div>
				<div class="column medium-12 medium-order-2 large-2 large-order-1">
					<div class="row">
						<div class="callout order-callout">
							<label for="">Search
								<input type="text" id="custom-searchbox">
							</label>
							<a href="#">Advanced Search</a>
						</div>
					</div>
					<div class="row">
						<div class="callout order-callout">
							<h6><strong>Orders</strong></h6>
							<ul class="menu">
								<li><a href="#">Active Orders</a></li>
								<hr>
								<li><a href="#">New Orders</a></li>
								<hr>
								<li><a href="#">Order History</a></li>
								<hr>
								<li><a href="#">Hold Orders</a></li>
								<hr>
								<a id="notes">Filter</a>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!--End Of Body Content -->
	</div>
</div>
</div>
