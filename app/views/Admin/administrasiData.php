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
					class="flex items-center p-2 mt-10 text-white rounded-lg hover:bg-[#3063C559]">
					<img src="../../../public/img/Home_fill (1).png" alt="logo" class="w-5 h-5" />
					<span class="flex-1 ms-3 whitespace-nowrap">Beranda</span>
				</a>
			</li>
			<li>
				<a href="<?= BASEURL; ?>./" class="flex items-center p-2 text-white rounded-lg hover:bg-[#3063C559]">
					<img src="../../../public/img/File_dock_add_fill.png" alt="logo" class="w-5 h-5" />
					<span class="flex-1 ms-3 whitespace-nowrap">Form Prestasi</span>
				</a>
			</li>
			<li>
				<a href="<?= BASEURL; ?>./" class="flex items-center p-2 text-white rounded-lg hover:bg-[#3063C559]">
					<img src="../../../public/img/File_dock_search_fill.png" alt="logo" class="w-5 h-5" />
					<span class="flex-1 ms-3 whitespace-nowrap">Daftar Prestasi</span>
				</a>
			</li>
			<li>
				<a href="<?= BASEURL; ?>./" class="flex items-center p-2 text-[#FEC01A] rounded-lg bg-[#3063C559]">
					<img src="../../../public/img/Layers_fill.png" alt="logo" class="w-5 h-5" />
					<span class="flex-1 ms-3 whitespace-nowrap">Administrasi Data</span>
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
		<p class="font-bold">Admin12345</p>
		<img src="../../../public/img/Logo_archhieveIT.png" alt="logo" class="w-8 h-auto">
	</section>

	<!-- adm data -->
	<section class="flex-col justify-start pl-6">
		<p class="font-bold text-3xl">Administrasi Data</p>
	</section>

	<section class="flex justify-start p-6 space-x-4 w-auto">
		<div class="flex flex-col space-y-4 w-1/3">
			<div class="flex flex-col w-full justify-center bg-white rounded-lg shadow-lg space-y-2 p-6">
				<img src="../../../public/img/Data-Dosen.png" alt="logo" class="w-32 mx-auto">
				<a href="<?= BASEURL; ?>./">
					<button
						class="text-white text-xl w-full py-2 font-semibold items-center justify-center bg-[#132145] rounded-lg">Data
						Dosen</button>
				</a>
			</div>

			<div class="flex flex-col w-full justify-center bg-white rounded-lg shadow-lg space-y-2 p-6">
				<img src="../../../public/img/pengaturan.png" alt="logo" class="w-32 mx-auto">
				<a href="<?= BASEURL; ?>./">
					<button
						class="text-white text-xl w-full py-2 font-semibold items-center justify-center bg-[#132145] rounded-lg">Pengaturan
						Prestasi</button>
				</a>
			</div>
		</div>
		<div class="flex flex-col space-y-4 w-1/3">
			<div class="flex flex-col w-full justify-center bg-white rounded-lg shadow-lg space-y-2 p-6">
				<img src="../../../public/img/data-mhs.png" alt="logo" class="w-32 mx-auto">
				<a href="<?= BASEURL; ?>./">
					<button
						class="text-white text-xl w-full py-2 font-semibold items-center justify-center bg-[#132145] rounded-lg">Data
						Mahasiswa</button>
				</a>
			</div>
		</div>
	</section>

</section>