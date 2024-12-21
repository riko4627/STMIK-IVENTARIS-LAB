 {{-- Form updert data --}}
 <div class="modal fade" id="formCategoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryLabel"
 aria-hidden="true">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="modal-title">Tambah Data</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <form id="modalTambah">
             <div class="modal-body">
                 @csrf
                 <div class="row">
                     <div class="col-md-12" id="form-preview">
                     </div>
                     <div class="col-md-12">
                         <div class="modal-group fill modal-show-validation">
                             <input type="hidden" name="id" id="id" value="">
                             <label>Nama Kategori </label>
                             <input id="name" name="name" type="text" class="form-control"
                                 placeholder="Nama Kategori Barang" autocomplete="off">
                         </div>
                     </div>
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
                 <button type="submit" class="btn btn-outline-primary">Simpan Data</button>
             </div>
         </form>
     </div>
 </div>
</div>