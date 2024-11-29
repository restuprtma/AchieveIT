<!-- sidebar -->
<aside id="default-sidebar"
	class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
	aria-label="Sidebar">
	<div class="h-full px-3 py-4 overflow-y-auto bg-[#132145]">
		<ul class="space-y-2 font-medium">
			<li>
				<div class="flex items-center justify-center text-4xl p-4 text-white rounded-lg">
					<span class="ms-3 font-bold">AchieveIT</span>
				</div>
			</li>
			<li>
				<a href="<?= BASEURL; ?>./"
					class="flex items-center p-2 mt-10 text-[#FEC01A] rounded-lg bg-[#3063C559]">
					<img src="../../../public/img/Home_fill.png" alt="logo" class="w-5 h-5" />
					<span class="flex-1 ms-3 whitespace-nowrap">Beranda</span>
				</a>
			</li>
			<li>
				<a href="<?= BASEURL; ?>./" class="flex items-center p-2 text-white rounded-lg hover:bg-[#3063C559]">
					<img src="../../../public/img/File_dock_search_fill.png" alt="logo" class="w-5 h-5" />
					<span class="flex-1 ms-3 whitespace-nowrap">Daftar Prestasi</span>
				</a>
			</li>
			<li>
				<a href="<?= BASEURL; ?>./" class="flex items-center p-2 text-white rounded-lg hover:bg-[#3063C559]">
					<img src="../../../public/img/User_circle.png" alt="logo" class="w-5 h-5" />
					<span class="flex-1 ms-3 whitespace-nowrap">Lihat Profil</span>
				</a>
			</li>
		</ul>
	</div>
</aside>

<section class="sm:ml-64 bg-blue-50 min-h-screen">
	<!-- profil -->
	<section class="flex justify-end items-center p-8 space-x-3">
		<p class="font-bold">Kajur12345</p>
		<img src="../../../public/img/Logo_archhieveIT.png" alt="logo" class="w-8 h-auto" />
	</section>

	<!-- selamat datang -->
	<section class="flex-col justify-start p-6 space-y-4">
		<p class="font-bold text-4xl">Selamat Datang</p>
		<p class="font-semibold text-2xl text-[#F99D1C]">
			Kajur12345 / 2341720001
		</p>
	</section>

	<!-- prestasi -->
	<section class="flex justify-start p-6 space-x-10">
		<!-- total prestasi -->
		<div class="bg-white p-4 rounded-lg shadow-lg border w-1/4">
			<div class="flex justify-start space-x-4">
				<img src="../../../public/img/Total_Prestasi.png" alt="logo" class="w-auto h-12" />
				<div class="flex-col">
					<p class="font-semibold text-[#757575] text-[12px]">
						Total Prestasi
					</p>
					<p class="font-bold">500</p>
				</div>
			</div>
		</div>

		<!-- total mhs JTI -->
		<div class="bg-white p-4 rounded-lg shadow-lg border w-1/4">
			<div class="flex justify-start space-x-4">
				<img src="../../../public/img/Mhs_JTI.png" alt="logo" class="w-auto h-12" />
				<div class="flex-col">
					<p class="font-semibold text-[#757575] text-[12px]">
						Total Mahasiswa JTI
					</p>
					<p class="font-bold">1500</p>
				</div>
			</div>
		</div>

		<!-- rata rata -->
		<div class="bg-white p-4 rounded-lg shadow-lg border w-1/4">
			<div class="flex justify-start space-x-4">
				<img src="../../../public/img/rata_rata.png" alt="logo" class="w-auto h-12" />
				<div class="flex-col">
					<p class="font-semibold text-[#757575] text-[12px]">
						Rata-rata Per Tahun
					</p>
					<p class="font-bold">100</p>
				</div>
			</div>
		</div>

		<!-- total mapres -->
		<div class="bg-white p-4 rounded-lg shadow-lg border w-1/4">
			<div class="flex justify-start space-x-4">
				<img src="../../../public/img/maPres.png" alt="logo" class="w-auto h-12" />
				<div class="flex-col">
					<p class="font-semibold text-[#757575] text-[12px]">
						Total MaPres
					</p>
					<p class="font-bold">250</p>
				</div>
			</div>
		</div>
	</section>

	<!-- judul -->
	<section class="flex-col justify-start pl-6">
		<p class="font-semibold text-2xl">
			Analisis Data Prestasi Mahasiswa JTI
		</p>
	</section>

	<!-- Diagram Lingkaran Analisis -->
	<section
		class="flex flex-col justify-normal m-6 p-6 space-y-4 bg-white border-2 border-blue-500 rounded-lg shadow-lg">
		<!-- judul -->
		<div class="flex justify-center">
			<p class="font-semibold text-2xl">Diagram Lingkaran Analisis</p>
		</div>

		<!-- kategori -->
		<div class="flex justify-end">
			<select class="rounded-lg px-2 py-1 w-1/6 bg-white shadow-gray-400 shadow-sm">
				<option>Kategori</option>
				<option>Sains</option>
				<option>Sains</option>
				>
			</select>
		</div>
		<div class="w-1/2 h-auto mx-auto flex justify-center items-center">
			<canvas id="DiagramPie"></canvas>
		</div>
	</section>

	<!-- chart bar pertahun -->
	<section class="flex flex-col m-6 p-6 space-y-4 bg-white border-2 border-blue-500 rounded-lg shadow-lg">
		<!-- judul -->
		<div class="flex justify-center ju">
			<p class="font-semibold text-2xl">
				Diagram Batang Prestasi Per Tahun
			</p>
		</div>

		<!-- kategori -->
		<div class="flex justify-end">
			<select class="rounded-lg px-2 py-1 w-1/6 bg-white shadow-gray-400 shadow-sm">
				<option>Kategori</option>
				<option>Sains</option>
				<option>Sains</option>
				>
			</select>
		</div>
		<div class="">
			<canvas id="DiagramBatangPerTahun"></canvas>
		</div>
	</section>

	<!-- chart bar per 1tahun -->
	<section class="flex flex-col m-6 p-6 space-y-4 bg-white border-2 border-blue-500 rounded-lg shadow-lg">
		<!-- judul -->
		<div class="flex justify-center ju">
			<p class="font-semibold text-2xl">
				Diagram Batang Prestasi Dalam 1 Tahun
			</p>
		</div>

		<!-- kategori -->
		<div class="flex justify-end">
			<select class="rounded-lg px-2 py-1 w-1/6 bg-white shadow-gray-400 shadow-sm">
				<option>Kategori</option>
				<option>Sains</option>
				<option>Sains</option>
				>
			</select>
		</div>
		<div class="">
			<canvas id="DiagramBatang1Tahun"></canvas>
		</div>
	</section>

	<!-- judul -->
	<section class="flex-col justify-start pl-6 pt-6">
		<p class="font-semibold text-2xl">Daftar Mahasiswa Berprestasi</p>
	</section>

	<!-- table -->
	<?php include __DIR__ . '/../../components/DaftarMahasiswaBerprestasi.php'; ?>

	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="../../components/Diagram.js"></script>
</section>