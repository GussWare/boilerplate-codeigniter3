 <h5 class="text-center text-muted font-weight-normal mb-4"><?php echo lang("auth_recuperar_title"); ?></h5>

 <form id="form-recuperar">
     <div class="form-group">
         <label class="form-label"><?php echo lang("auth_email"); ?></label>
         <input type="text" class="form-control" />

         <small class="invalid-feedback">A block of help text that breaks onto a new line and may extend beyond one line.</small>
     </div>

     <button type="button" class="btn btn-primary btn-block mt-4" onclick="recuperar.recuperar()"><?php echo lang("actions_send"); ?></button>
     <div class="text-light small mt-4">

     </div>
 </form>

 <!-- Core scripts -->
 <?php $this->load->view("scripts_view");  ?>

 <?php echo script_tag('assets/vendor/libs/validate/validate.js'); ?>
 <?php echo script_tag('assets/js/plugins/ajaxForm/jquery.ajaxForm.js'); ?>
 <?php echo script_tag('assets/js/modules/sistema/recuperar.js'); ?>

 <script type="text/javascript">
     $(document).ready(function() {
         recuperar.initForm({
             form: {
                 rules: {
                     email: {
                         required: true,
                         email: true
                     }
                 }
             }
         });
     });
 </script>