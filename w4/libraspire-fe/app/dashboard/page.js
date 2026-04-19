"use client";
import Navbar from "../components/navbar";
import Footer from "../components/Footer";
import { bukuList } from "../../data/buku";

export default function Dashboard() {
  const renderBuku = (kategori, cols) => (
    <div style={{ display: "grid", gridTemplateColumns: `repeat(${cols}, 1fr)`, gap: "15px" }}>
      {bukuList.filter(b => b.kategori === kategori).map(buku => (
        <div key={buku.id} style={{ background: "white", padding: "10px", borderRadius: "15px", boxShadow: "0 2px 8px rgba(0,0,0,0.05)", textAlign: "left" }}>
          <img src={buku.cover} style={{ width: "100%", aspectRatio: "2/3", objectFit: "cover", borderRadius: "8px" }} />
          {/* Judul Buku - Font Semi-Bold */}
          <h3 style={{ fontSize: "10px", fontWeight: "700", margin: "8px 0 2px", letterSpacing: "-0.2px" }}>{buku.judul}</h3>
          <p style={{ fontSize: "8px", fontWeight: "500", color: "#888", margin: "0" }}>{buku.pengarang}</p>
          <p style={{ fontSize: "8px", fontWeight: "400", color: "#aaa" }}>{buku.tahun}</p>
          <button style={{ 
            width: "100%", 
            background: "#0d2861", 
            color: "white", 
            border: "none", 
            padding: "5px", 
            borderRadius: "20px", 
            fontSize: "9px", 
            fontWeight: "700",
            fontFamily: "inherit",
            cursor: "pointer" 
          }}>Pinjam</button>
        </div>
      ))}
    </div>
  );

  return (
    <div style={{ 
      backgroundColor: "#f8f9fa", 
      minHeight: "100vh",
      // Set font ke Inter untuk seluruh dashboard
      fontFamily: "'Inter', sans-serif",
      WebkitFontSmoothing: "antialiased"
    }}>
      {/* Load Google Fonts Inter */}
      <style jsx global>{`
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');
      `}</style>

      <Navbar />
      <main style={{ maxWidth: "1200px", margin: "0 auto", padding: "40px 20px" }}>
        
        {/* Section Popular - Judul Ekstra Bold & Rapat */}
        <section style={{ marginBottom: "50px", textAlign: "center" }}>
          <h2 style={{ 
            color: "#0d2861", 
            fontSize: "28px", 
            fontWeight: "900", // Ekstra Bold sesuai gambar
            marginBottom: "30px",
            letterSpacing: "-0.8px" 
          }}>Popular Now</h2>
          {renderBuku("popular", 5)}
        </section>

        {/* Section Categories */}
        <section style={{ marginBottom: "50px", textAlign: "center" }}>
          <h2 style={{ 
            color: "#0d2861", 
            fontSize: "28px", 
            fontWeight: "900", 
            marginBottom: "30px",
            letterSpacing: "-0.8px" 
          }}>Book Categories</h2>
          <div style={{ display: "grid", gridTemplateColumns: "repeat(5, 1fr)", gap: "15px" }}>
            {[1,2,3,4,5].map(i => (
              <div key={i} style={{ background: "#0d2861", color: "white", padding: "20px", borderRadius: "10px", textAlign: "left" }}>
                <span style={{ fontSize: "12px", fontWeight: "500", opacity: 0.8 }}>Technology</span>
                <h4 style={{ fontSize: "18px", fontWeight: "700", margin: "5px 0 0", letterSpacing: "-0.3px" }}>2500 Books</h4>
              </div>
            ))}
          </div>
        </section>

        {/* Section Latest Collection */}
        <section style={{ textAlign: "center" }}>
          <h2 style={{ 
            color: "#0d2861", 
            fontSize: "28px", 
            fontWeight: "900", 
            marginBottom: "30px",
            letterSpacing: "-0.8px" 
          }}>Our Latest Collection</h2>
          {renderBuku("latest", 8)}
        </section>

      </main>
      <Footer />
    </div>
  );
}