 <div class="modal fade" id="forminventoryModal" tabindex="-1" role="dialog" aria-labelledby="labLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modal-title">Tambah Data</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <form id="formTambah">
                 <div class="modal-body">
                     @csrf
                     <div class="row">
                         <div class="col-md-12" id="form-preview">
                         </div>
                         <div class="col-md-12">
                             <div class="modal-group fill modal-show-validation">
                                 <input type="hidden" name="id" id="id" value="">
                                 <label>Nama barang </label>
                                 <input id="item_name" name="item_name" type="text" class="form-control"
                                     placeholder="Nama Barang" autocomplete="off">
                             </div>
                         </div>
                         <div class="col-md-12 mt-3">
                             <div class="modal-group fill modal-show-validation">
                                 <label>Jumlah barang</label>
                                 <input id="total_items" name="total_item" type="text" class="form-control"
                                     placeholder="Jumlah barang" autocomplete="off">
                             </div>
                         </div>
                         <div class="col-md-12 mt-3">
                             <div class="modal-group fill modal-show-validation">
                                 <label>Jumlah barang baik</label>
                                 <input id="total_items_good" name="total_items_good" type="text" class="form-control"
                                     placeholder="Jumlah Barang Baik" autocomplete="off">
                             </div>
                         </div>
                         <div class="col-md-12 mt-3">
                             <div class="modal-group fill modal-show-validation">
                                 <label>Jumlah barang rusak</label>
                                 <input id="total_items_crash" name="total_items_crash" type="text" class="form-control"
                                     placeholder="Jumlah Barang Rusak" autocomplete="off">
                             </div>
                         </div>
                         <div class="col-md-12 mt-3">
                             <div class="modal-group fill modal-show-validation">
                                 <label>Spesifikasi</label>
                                 <input id="spesification" name="spesification" type="text" class="form-control"
                                     placeholder="Spesifikasi" autocomplete="off">
                             </div>
                         </div>
                         <div class="col-md-12 mt-3">
                             <div class="modal-group fill modal-show-validation">
                                 <label>Kategori</label>
                                    <select name="id_category" id="id_category" class="form-control">
                                        <option value="" selected disabled hidden>Choose here</option>
                                        <!-- Kategori diambil dari tabel kategori -->
                                    </select>
                             </div>
                         </div>
                         <div class="col-md-12 mt-3">
                             <div class="modal-group fill modal-show-validation">
                                 <label>Lab</label>
                                    <select name="id_lab" id="id_lab" class="form-control">
                                        <option value="" selected disabled hidden>Choose here</option>
                                        <!-- Kategori diambil dari tabel kategori -->
                                    </select>
                             </div>
                         </div>
                         <div class="col-md-12 mt-3">
                             <div class="modal-group fill modal-show-validation">
                                 <label>Tahun</label>
                                    <select name="id_year" id="id_year" class="form-control">
                                        <option value="" selected disabled hidden>Choose here</option>
                                        <!-- Kategori diambil dari tabel kategori -->
                                    </select>
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