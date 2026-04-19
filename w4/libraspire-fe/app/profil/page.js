"use client";

import Navbar from "../components/navbar";
import Footer from "../components/Footer";

export default function Profile() {
  // Data dummy sesuai gambar
  const userData = {
    name: "Oakley Caesar",
    email: "Oakleyc@gmail.com",
    password: "••••••••",
    image: "https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?q=80&w=1887&auto=format&fit=crop"
  };

  return (
    <div style={{ minHeight: "100vh", display: "flex", flexDirection: "column", backgroundColor: "#f1f3f5", fontFamily: "sans-serif" }}>
      <Navbar />

      {/* Container Utama */}
      <main style={{ flex: 1, display: "flex", alignItems: "center", justifyContent: "center", padding: "40px 20px" }}>
        
        {/* Card Profile Biru Tua */}
        <div style={{
          backgroundColor: "#0a193d",
          width: "100%",
          maxWidth: "800px",
          borderRadius: "30px",
          padding: "50px",
          display: "flex",
          alignItems: "center",
          gap: "50px",
          position: "relative",
          boxShadow: "0 20px 25px -5px rgba(0, 0, 0, 0.2)"
        }}>
          
          {/* Bagian Foto (Kiri) */}
          <div style={{ flex: "0 0 auto" }}>
            <div style={{
              width: "180px",
              height: "180px",
              borderRadius: "50%",
              overflow: "hidden",
              border: "4px solid #1a2b56"
            }}>
              <img 
                src={userData.image} 
                alt="Profile" 
                style={{ width: "100%", height: "100%", objectFit: "cover" }}
              />
            </div>
          </div>

          {/* Bagian Informasi (Kanan) */}
          <div style={{ flex: 1, color: "white" }}>
            <div style={{ display: "flex", flexDirection: "column", gap: "20px" }}>
              
              {/* Row Name */}
              <div style={{ display: "flex", justifyContent: "space-between", alignItems: "center" }}>
                <span style={{ fontSize: "22px", fontWeight: "bold" }}>Name</span>
                <span style={{ fontSize: "18px", opacity: 0.9 }}>{userData.name}</span>
              </div>

              {/* Row Email */}
              <div style={{ display: "flex", justifyContent: "space-between", alignItems: "center" }}>
                <span style={{ fontSize: "22px", fontWeight: "bold" }}>Email</span>
                <span style={{ fontSize: "18px", opacity: 0.9 }}>{userData.email}</span>
              </div>

              {/* Row Password */}
              <div style={{ display: "flex", justifyContent: "space-between", alignItems: "center" }}>
                <span style={{ fontSize: "22px", fontWeight: "bold" }}>Password</span>
                <span style={{ fontSize: "18px", opacity: 0.9 }}>{userData.password}</span>
              </div>

              {/* Tombol Log Out */}
              <div style={{ marginTop: "10px" }}>
                <button style={{
                  background: "none",
                  border: "none",
                  color: "#ff3b30",
                  fontSize: "22px",
                  fontWeight: "bold",
                  cursor: "pointer",
                  padding: 0
                }}>
                  Log Out
                </button>
              </div>
            </div>
          </div>

          {/* Tombol Edit di Kanan Bawah */}
          <div style={{ position: "absolute", bottom: "40px", right: "50px" }}>
            <button style={{
              backgroundColor: "white",
              color: "#0a193d",
              fontWeight: "bold",
              padding: "10px 60px",
              borderRadius: "50px",
              border: "none",
              fontSize: "18px",
              cursor: "pointer",
              boxShadow: "0 4px 6px rgba(0,0,0,0.1)"
            }}>
              Edit
            </button>
          </div>

        </div>
      </main>

      <Footer />
    </div>
  );
}