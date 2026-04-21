"use client";

import { useParams, useRouter } from "next/navigation";
import { bukulatest } from "../../../data/buku";
import { bukupplr } from "../../../data/buku1";

export default function DetailBuku() {
  const { id } = useParams();
  const router = useRouter();

  const semuaBuku = [...bukulatest, ...bukupplr];
  const buku = semuaBuku.find((b) => b.id == id);

  if (!buku) return <h2 style={{ textAlign: "center" }}>Buku tidak ditemukan</h2>;

  return (
    <div style={{
      margin: 0,
      minHeight: "100vh",
      fontFamily: "Inter, sans-serif",
      background: "linear-gradient(135deg, #041f3d 0%, #0f3f74 38%, #ffffff 100%)",
      display: "flex",
      flexDirection: "column",
      alignItems: "center",
      justifyContent: "center",
      padding: "40px 24px"
    }}>

      {/* CARD */}
      <section style={{
        width: "100%",
        maxWidth: "1120px",
        borderRadius: "36px",
        overflow: "hidden",
        background: "#fbfdff",
        boxShadow: "0 40px 120px rgba(15, 23, 42, 0.18)",
        display: "grid",
        gridTemplateColumns: "minmax(300px, 420px) 1fr"
      }}>

        {/* LEFT (COVER) */}
        <div style={{
          background: "linear-gradient(180deg, #0d3b68 0%, #27598f 100%)",
          padding: "40px",
          display: "flex",
          alignItems: "center",
          justifyContent: "center"
        }}>
          <div style={{
            width: "100%",
            maxWidth: "320px",
            borderRadius: "28px",
            overflow: "hidden",
            boxShadow: "0 32px 70px rgba(8, 29, 63, 0.24)",
            background: "#fff"
          }}>
            <img
              src={buku.cover}
              style={{ width: "100%", display: "block" }}
            />
          </div>
        </div>

        {/* RIGHT (CONTENT) */}
        <div style={{
          padding: "48px 44px",
          display: "flex",
          flexDirection: "column",
          justifyContent: "space-between"
        }}>

          <div>
            {/* HEADER */}
            <div style={{ maxWidth: "680px" }}>
              <h1 style={{
                fontSize: "clamp(2.5rem, 3vw, 3.75rem)",
                fontWeight: "800",
                marginBottom: "16px",
                letterSpacing: "-0.04em",
                color: "#0f172a"
              }}>
                {buku.judul}
              </h1>

              <p style={{ color: "#475569", marginBottom: "12px" }}>
                {buku.pengarang} | <b>{buku.tahun || "-"}</b>
              </p>

              <p style={{ color: "#64748b", marginBottom: "26px" }}>
                Tanpa kategori
              </p>
            </div>

            {/* STATS */}
            <div style={{
              display: "grid",
              gridTemplateColumns: "repeat(2, 1fr)",
              gap: "18px",
              marginBottom: "32px"
            }}>
              <div style={{
                background: "#f8fafc",
                border: "1px solid #e2e8f0",
                borderRadius: "24px",
                padding: "22px"
              }}>
                <div style={{ fontSize: "12px", color: "#64748b" }}>ISBN</div>
                <div style={{ fontSize: "18px", fontWeight: "700" }}>
                  {buku.isbn}
                </div>
              </div>

              <div style={{
                background: "#f8fafc",
                border: "1px solid #e2e8f0",
                borderRadius: "24px",
                padding: "22px"
              }}>
                <div style={{ fontSize: "12px", color: "#64748b" }}>Tersedia</div>
                <div style={{ fontSize: "18px", fontWeight: "700" }}>
                  {Math.floor(Math.random() * 10) + 1} Left
                </div>
              </div>
            </div>

            {/* SINOPSIS */}
            <div style={{
              color: "#475569",
              lineHeight: "1.8",
              whiteSpace: "pre-line"
            }}>
              {buku.sinopsis || "Sinopsis belum tersedia."}
            </div>
          </div>

          {/* BUTTON */}
          <div style={{ marginTop: "30px" }}>
            <button
              onClick={() => router.back()}
              style={{
                padding: "14px 28px",
                borderRadius: "999px",
                border: "1px solid #0f172a",
                background: "#fff",
                fontWeight: "700",
                cursor: "pointer",
                transition: "0.2s"
              }}
              onMouseEnter={(e) => {
                e.target.style.background = "#0f172a";
                e.target.style.color = "#fff";
              }}
              onMouseLeave={(e) => {
                e.target.style.background = "#fff";
                e.target.style.color = "#000";
              }}
            >
              ← Back
            </button>
          </div>

        </div>
      </section>

      {/* FOOTER */}
      <div style={{
        marginTop: "32px",
        textAlign: "center",
        color: "#cbd5e1"
      }}>
        <p>© 2025 LibrAspire. All rights reserved.</p>
        <p>Jl Raya ITS, Surabaya, Indonesia</p>
      </div>

    </div>
  );
}