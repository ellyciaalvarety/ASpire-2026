"use client";
import { useState } from "react";
import { useRouter } from "next/navigation";
import Navbar from "../components/navbar";
import Footer from "../components/Footer";
import { bukulatest } from "../../data/buku";
import { bukupplr } from "../../data/buku1";

export default function Dashboard() {
  const router = useRouter();

  const [dipinjam, setDipinjam] = useState([]);
  const [search, setSearch] = useState("");

  const handlePinjam = (id) => {
    if (!dipinjam.includes(id)) {
      setDipinjam((prev) => [...prev, id]);
    }
  };

  // FILTER SEARCH
  const filterBuku = (data) => {
    return data.filter((buku) =>
      buku.judul.toLowerCase().includes(search.toLowerCase())
    );
  };

  const renderBuku = (data, cols, cardPadding = "10px", fontScale = 1) => (
    <div
      style={{
        display: "grid",
        gridTemplateColumns: `repeat(${cols}, 1fr)`,
        gap: "20px",
      }}
    >
      {filterBuku(data).map((buku) => {
        const isDipinjam = dipinjam.includes(buku.id);

        return (
          <div
            key={buku.id}
            onClick={() => router.push(`/buku/${buku.id}`)}
            style={{
              background: "white",
              padding: cardPadding,
              borderRadius: "15px",
              boxShadow: "0 4px 12px rgba(0,0,0,0.08)",
              textAlign: "left",
              cursor: "pointer",
              transition: "all 0.3s ease",
            }}
            onMouseEnter={(e) => {
              e.currentTarget.style.transform = "translateY(-5px)";
              e.currentTarget.style.boxShadow =
                "0 8px 20px rgba(0,0,0,0.15)";
            }}
            onMouseLeave={(e) => {
              e.currentTarget.style.transform = "translateY(0)";
              e.currentTarget.style.boxShadow =
                "0 4px 12px rgba(0,0,0,0.08)";
            }}
          >
            <img
              src={buku.cover}
              style={{
                width: "100%",
                aspectRatio: "2/3",
                objectFit: "cover",
                borderRadius: "10px",
                transition: "0.3s",
              }}
            />

            <h3
              style={{
                fontSize: `${12 * fontScale}px`,
                fontWeight: "700",
                margin: "10px 0 4px",
              }}
            >
              {buku.judul}
            </h3>

            <p
              style={{
                fontSize: `${10 * fontScale}px`,
                color: "#888",
                margin: 0,
              }}
            >
              {buku.pengarang}
            </p>

            <button
              onClick={(e) => {
                e.stopPropagation(); // biar ga ikut ke klik card
                handlePinjam(buku.id);
              }}
              disabled={isDipinjam}
              style={{
                width: "100%",
                background: isDipinjam ? "green" : "#0d2861",
                color: "white",
                border: "none",
                padding: "6px",
                borderRadius: "20px",
                fontSize: `${10 * fontScale}px`,
                marginTop: "8px",
                cursor: isDipinjam ? "not-allowed" : "pointer",
              }}
            >
              {isDipinjam ? "Dipinjam" : "Pinjam"}
            </button>
          </div>
        );
      })}
    </div>
  );

  return (
    <div
      style={{
        backgroundColor: "#f8f9fa",
        minHeight: "100vh",
        fontFamily: "'Inter', sans-serif",
      }}
    >
      <Navbar search={search} setSearch={setSearch} />

      <main style={{ maxWidth: "1200px", margin: "0 auto", padding: "40px 20px" }}>
        
        {/* Popular */}
        <section style={{ marginBottom: "50px", textAlign: "center" }}>
          <h2 style={{ color: "#0d2861", fontSize: "28px", fontWeight: "900", marginBottom: "30px" }}>
            Popular Now
          </h2>
          {renderBuku(bukupplr, 5, "12px", 1.1)}
        </section>

        {/* Latest */}
        <section style={{ textAlign: "center" }}>
          <h2 style={{ color: "#0d2861", fontSize: "28px", fontWeight: "900", marginBottom: "30px" }}>
            Our Latest Collection
          </h2>
          {renderBuku(bukulatest, 6, "10px", 0.95)}
        </section>

      </main>

      <Footer />
    </div>
  );
}