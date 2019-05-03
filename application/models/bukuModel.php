<?php  
	class bukuModel extends CI_Model
	{	
		function display()
		{
			$query=$this->db->query("SELECT buku.*, detil_pinjam.* FROM buku
			LEFT JOIN detil_pinjam ON detil_pinjam.Kdregister = buku.KdRegister");
			return $query->result();		
		}

		function store($judul,$pengarang,$penerbit,$tahun){
			$data = array(
				'Judul_Buku' => $judul,
				'Pengarang' => $pengarang,
				'Penerbit' => $penerbit,
				'Tahun_Terbit' => $tahun
			);
			$this->db->insert("buku",$data);	
		}

		function ubah($id){
			$query=$this->db->get_where("buku",array('KdRegister'=>$id));
			return $query->result();
		}

		function save($judul,$pengarang,$penerbit,$tahun,$id){
			$data = array(
				'Judul_Buku' => $judul,
				'Pengarang' => $pengarang,
				'Penerbit' => $penerbit,
				'Tahun_Terbit' => $tahun
			);
			$this->db->where('KdRegister',$id);
			$this->db->update("buku",$data);
		}
	}
?>