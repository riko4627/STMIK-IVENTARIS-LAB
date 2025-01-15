 <div class="modal fade" id="formLabModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modal-title">Form Data</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <form id="formTambah">
                 <div class="modal-body">
                     @csrf
                     <div class="form-group fill modal-show-validation">
                         <label for="name">Nama</label>
                         <input id="name" name="name" type="text" class="form-control"
                             placeholder="Nama Ruangan" autocomplete="off">
                     </div>
                     <div class="form-group fill modal-show-validation">
                         <label for="location">Lantai</label>
                         <textarea id="location" name="location" class="form-control" placeholder="Lantai" rows="3" autocomplete="off"></textarea>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal">Tutup</button>
                     <button type="submit" class="btn btn-sm btn-outline-primary">Simpan Data</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
