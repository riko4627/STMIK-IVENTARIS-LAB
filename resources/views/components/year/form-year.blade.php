 {{-- Form updert data --}}
 <div class="modal fade" id="formYearModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
 aria-hidden="true">
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
                <div class="modal-group fill modal-show-validation">
                    <input type="hidden" name="id" id="id" value="">
                    <label>Tahun </label>
                    <input id="year" name="year" type="text" class="form-control"
                        placeholder="2xx0" autocomplete="off">
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
