/**
 * Fungsi untuk menampilkan hasil download
 /**
 * Fungsi untuk menampilkan hasil download
 * @param {string} result - Nama file yang didownload
 */
const showDownload = (result) => {
  console.log("Download selesai");
  console.log(`Hasil Download: ${result}`);
};

/**
 * Fungsi untuk download file menggunakan Promise
 * @returns {Promise<string>} Promise yang menyelesaikan nama file yang diunduh
 */
const download = () => {
  return new Promise((resolve) => {
    setTimeout(() => {
      const result = "Windows Najwa-0110223059";
      resolve(result);
    }, 3000);
  });
};

/**
 * Fungsi utama menggunakan async/await
 */
const main = async () => {
  console.log("Memulai proses download...");
  const result = await download();
  showDownload(result);
};

main();
