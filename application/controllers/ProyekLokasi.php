<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProyekLokasi extends CI_Controller
{

	private $apiUrl = "http://localhost:8080"; // URL API yang telah dibuat

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
	}

	public function index()
	{
		// Ambil data proyek dan lokasi dari REST API
		$data['proyek'] = $this->getApiData("/proyek");
		$data['lokasi'] = $this->getApiData("/lokasi");
		$this->load->view('proyeklokasi/index', $data);
	}

	public function create_proyek()
	{
		$this->load->view('proyeklokasi/create_proyek');
	}

	public function create_lokasi()
	{
		$this->load->view('proyeklokasi/create_lokasi');
	}

	public function store_proyek()
	{
		$this->form_validation->set_rules('nama_proyek', 'Nama Proyek', 'required');
		$this->form_validation->set_rules('client', 'Client', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->create_proyek();
		} else {
			$data = [
				'namaProyek' => $this->input->post('nama_proyek'),
				'client' => $this->input->post('client'),
				'tglMulai' => $this->input->post('tgl_mulai'),
				'tglSelesai' => $this->input->post('tgl_selesai'),
				'pimpinanProyek' => $this->input->post('pimpinan_proyek'),
				'keterangan' => $this->input->post('keterangan'),
			];
			$this->postApiData("/proyek", $data);
			redirect('proyeklokasi');
		}
	}

	public function store_lokasi()
	{
		$this->form_validation->set_rules('nama_lokasi', 'Nama Lokasi', 'required');
		$this->form_validation->set_rules('negara', 'Negara', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->create_lokasi();
		} else {
			$data = [
				'namaLokasi' => $this->input->post('nama_lokasi'),
				'negara' => $this->input->post('negara'),
				'provinsi' => $this->input->post('provinsi'),
				'kota' => $this->input->post('kota'),
			];
			$this->postApiData("/lokasi", $data);
			redirect('proyeklokasi');
		}
	}

	public function edit_proyek($id)
	{
		$data['proyek'] = $this->getApiData("/proyek/{$id}");
		$this->load->view('proyeklokasi/edit_proyek', $data);
	}

	public function edit_lokasi($id)
	{
		$data['lokasi'] = $this->getApiData("/lokasi/{$id}");
		$this->load->view('proyeklokasi/edit_lokasi', $data);
	}

	public function update_proyek($id)
	{
		$data = [
			'namaProyek' => $this->input->post('nama_proyek'),
			'client' => $this->input->post('client'),
			'tglMulai' => $this->input->post('tgl_mulai'),
			'tglSelesai' => $this->input->post('tgl_selesai'),
			'pimpinanProyek' => $this->input->post('pimpinan_proyek'),
			'keterangan' => $this->input->post('keterangan'),
		];
		$this->putApiData("/proyek/{$id}", $data);
		redirect('proyeklokasi');
	}

	public function update_lokasi($id)
	{
		$data = [
			'namaLokasi' => $this->input->post('nama_lokasi'),
			'negara' => $this->input->post('negara'),
			'provinsi' => $this->input->post('provinsi'),
			'kota' => $this->input->post('kota'),
		];
		$this->putApiData("/lokasi/{$id}", $data);
		redirect('proyeklokasi');
	}

	public function delete_proyek($id)
	{
		$this->deleteApiData("/proyek/{$id}");
		redirect('proyeklokasi');
	}

	public function delete_lokasi($id)
	{
		$this->deleteApiData("/lokasi/{$id}");
		redirect('proyeklokasi');
	}

	// Helper function untuk mendapatkan data dari REST API
	private function getApiData($endpoint)
	{
		$url = $this->apiUrl . $endpoint;
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPGET, true); // Pastikan metode GET digunakan
		$response = curl_exec($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$error = curl_error($ch);
		curl_close($ch);

		if ($httpCode != 200) {
			log_message('error', "cURL Error: HTTP $httpCode - $error");
			return []; // Kembalikan array kosong jika terjadi kesalahan
		}

		return json_decode($response, true);
	}

	// Helper function untuk mengirimkan data POST ke REST API
	private function postApiData($endpoint, $data)
	{
		$url = $this->apiUrl . $endpoint;
		$options = [
			'http' => [
				'header'  => "Content-Type: application/json\r\n",
				'method'  => 'POST',
				'content' => json_encode($data),
			],
		];
		$context = stream_context_create($options);
		return file_get_contents($url, false, $context);
	}

	// Helper function untuk mengirimkan data PUT ke REST API
	private function putApiData($endpoint, $data)
	{
		$url = $this->apiUrl . $endpoint;
		$options = [
			'http' => [
				'header'  => "Content-Type: application/json\r\n",
				'method'  => 'PUT',
				'content' => json_encode($data),
			],
		];
		$context = stream_context_create($options);
		return file_get_contents($url, false, $context);
	}

	// Helper function untuk mengirimkan data DELETE ke REST API
	private function deleteApiData($endpoint)
	{
		$url = $this->apiUrl . $endpoint;
		$options = [
			'http' => [
				'method'  => 'DELETE',
			],
		];
		$context = stream_context_create($options);
		return file_get_contents($url, false, $context);
	}
}
