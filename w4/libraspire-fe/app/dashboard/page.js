"use client";

import { useEffect, useState } from "react";
import Link from "next/link";
import { bukuList } from "../../data/buku";
import Navbar from "../components/navbar";
import Footer from "../components/Footer";

export default function Dashboard() {
  const [dipinjam, setDipinjam] = useState([]);

  // ambil dari localStorage
  useEffect(() => {
    const data = JSON.parse(localStorage.getItem("pinjam")) || [];
    setDipinjam(data);
  }, []);

  const handlePinjam = (buku) => {
    let updated;

    if (dipinjam.find((b) => b.id === buku.id)) {
      updated = dipinjam.filter((b) => b.id !== buku.id);
    } else {
      updated = [...dipinjam, buku];
    }

    setDipinjam(updated);
    localStorage.setItem("pinjam", JSON.stringify(updated));
  };

  const renderBuku = (kategori) =>
    bukuList
      .filter((b) => b.kategori === kategori)
      .map((buku) => {
        const isDipinjam = dipinjam.find((b) => b.id === buku.id);

        return (
          <div key={buku.id} className="card">
            <Link href={`/buku/${buku.id}`}>
              <img src={buku.cover} />
            </Link>

            <div className="card-body">
              <h4>{buku.judul}</h4>
              <small>{buku.pengarang}</small>

              <button
                className={isDipinjam ? "btn green" : "btn"}
                onClick={() => handlePinjam(buku)}
              >
                {isDipinjam ? "Dipinjam" : "Pinjam"}
              </button>
            </div>
          </div>
        );
      });

  return (
    <>
      <Navbar />

      <section className="section">
        <h2>Popular</h2>
        <div className="books">{renderBuku("popular")}</div>
      </section>

      <section className="section">
        <h2>Latest</h2>
        <div className="books">{renderBuku("latest")}</div>
      </section>

      <Footer />

      <style jsx>{`
        .books {
          display: grid;
          grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
          gap: 20px;
        }

        .card {
          background: white;
          border-radius: 20px;
          overflow: hidden;
          padding: 10px;
        }

        .card img {
          width: 100%;
          height: 200px;
          object-fit: cover;
        }

        .btn {
          margin-top: 10px;
          padding: 10px;
          border: none;
          border-radius: 10px;
          background: #ccc;
          cursor: pointer;
        }

        .green {
          background: green;
          color: white;
        }
      `}</style>
    </>
  );
}