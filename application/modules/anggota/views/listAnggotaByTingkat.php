<div class="table-responsive">
    <table class="display table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Anggota</th>
                <th>Asal Pangkalan</th>
                <th>Satuan</th>
                <th>Golongan</th>
                <th>Tingkat</th>
                <th>TA</th>
                <th class="text-center">#</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($anggota as $var) : ?>
                <tr id="tr_<?= $var->id_anggota ?>">
                    <td><?= $no++ ?></td>
                    <td><?= $var->nama ?></td>
                    <td><?= $var->nama_pangkalan ?></td>
                    <td><?= $var->ambalan ?></td>
                    <td><?= $var->golongan ?></td>
                    <td><?= $var->tingkat ?></td>
                    <td><?= $var->ta ?></td>
                    <td>
                        <div class="dropdown">
                            <a href="#" class="btn-sm btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white">
                                <i class="fas fa-align-justify"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="<?= site_url('anggota/lihat_anggota/') . $var->id_anggota  ?>"><i class="fa fa-eye"></i> Lihat</a>
                                <a class="dropdown-item" href="<?= site_url('anggota/edit_anggota/') . $var->id_anggota  ?>/anggota"><i class="fa fa-edit"></i> Edit</a>
                                <a class="dropdown-item" href="#" onclick="hapusAnggotaLainnya('<?= $golongan ?>','<?= $var->id_anggota ?>')"><i class="fa fa-trash"></i> Hapus</a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<script src="<?php echo base_url('assets/myjs/js_anggota.js') ?>" type="text/javascript"></script>