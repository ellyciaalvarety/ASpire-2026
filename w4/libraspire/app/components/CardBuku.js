"use client";
import { useState } from "react";

export default function CardBuku({ buku, isAdmin }) {
  const [status, setStatus] = useState("Tersedia");

  return (
    <div style={{ border: "1px solid gray", margin: 10, padding: 10 }}>
      
      <img src={buku.foto} width={120} />

      <h3>{buku.nama}</h3>
      <p>{buku.penulis}</p>
      <p>Stok: {buku.stok}</p>

      {/* MEMBER */}
      {!isAdmin && (
        <button onClick={() => setStatus("Diajukan")}>
          Pinjam
        </button>
      )}

      {/* ADMIN */}
      {isAdmin && (
        <div>
          <button onClick={() => setStatus("Disetujui")}>
            Setujui
          </button>
          <button onClick={() => setStatus("Ditolak")}>
            Tolak
          </button>
        </div>
      )}

      <p>Status: {status}</p>
    </div>
  );
}