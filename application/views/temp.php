<div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card card-gradient-2">
                <div class="card-body">
                  <label class="col-sm-3">Batch</label>
                  <div class="col-sm-9">
                    <select id="batch" name="batch">
                        <option disable selected>Choose Value</option>
                        <?php foreach ($batches as $batch):?>
                        <?php echo '<option value="'.$batch->batch.'">'.$batch->batch.'</option>';?>
                        <?php endforeach;?>
                    </select>
                  </div>
                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                  <script>
                    $(document).ready(function(){
                      $('#batch').change(function(){
                        value = $(this).val();
                        document.location = "<?= base_url();?>AdminController/PrintApplicants/"+value;
                      });
                    });
                  </script>
                </div>
              </div>
            </div>
          </div>