"use client";

import Navbar from "../components/navbar";
import Footer from "../components/Footer";

export default function Profile() {
  const userData = {
    name: "Oakley Caesar",
    email: "Oakleyc@gmail.com",
    password: "••••••••",
    image: "https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?q=80&w=1887&auto=format&fit=crop"
  };

  return (
    // MEMUAT FONT INTER DARI GOOGLE FONTS SECARA DYNAMIC
    <div style={{ 
      minHeight: "100vh", 
      display: "flex", 
      flexDirection: "column", 
      backgroundColor: "#f1f3f5",
      // MENERAPKAN FONT INTER KE SELURUH HALAMAN
      fontFamily: "'Inter', system-ui, -apple-system, sans-serif",
      WebkitFontSmoothing: "antialiased",
      MozOsxFontSmoothing: "grayscale"
    }}>
      {/* Import Inter Font Style */}
      <style>{`
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');
      `}</style>

      <Navbar />

      <main style={{ 
        flex: 1, 
        display: "flex", 
        alignItems: "center", 
        justifyContent: "center", 
        padding: "40px 20px" 
      }}>
        
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

          <div style={{ flex: 1, color: "white" }}>
            <div style={{ display: "flex", flexDirection: "column", gap: "20px" }}>
              
              <div style={{ display: "flex", justifyContent: "space-between", alignItems: "center" }}>
                <span style={{ 
                  fontSize: "22px", 
                  fontWeight: "800", // Ekstra Bold untuk Judul
                  letterSpacing: "-0.5px" // Sedikit dirapatkan agar mirip desain
                }}>Name</span>
                <span style={{ 
                  fontSize: "18px", 
                  fontWeight: "400", // Normal untuk Isi
                  opacity: 0.9 
                }}>{userData.name}</span>
              </div>

              <div style={{ display: "flex", justifyContent: "space-between", alignItems: "center" }}>
                <span style={{ fontSize: "22px", fontWeight: "800", letterSpacing: "-0.5px" }}>Email</span>
                <span style={{ fontSize: "18px", fontWeight: "400", opacity: 0.9 }}>{userData.email}</span>
              </div>

              <div style={{ display: "flex", justifyContent: "space-between", alignItems: "center" }}>
                <span style={{ fontSize: "22px", fontWeight: "800", letterSpacing: "-0.5px" }}>Password</span>
                <span style={{ fontSize: "18px", fontWeight: "400", opacity: 0.9 }}>{userData.password}</span>
              </div>

              <div style={{ marginTop: "10px" }}>
                <button style={{
                  background: "none",
                  border: "none",
                  color: "#ff3b30",
                  fontSize: "22px",
                  fontWeight: "800", // Ekstra Bold
                  cursor: "pointer",
                  padding: 0,
                  fontFamily: "inherit", // Memastikan tombol pakai font yang sama
                  letterSpacing: "-0.5px"
                }}>
                  Log Out
                </button>
              </div>
            </div>
          </div>

          <div style={{ position: "absolute", bottom: "40px", right: "50px" }}>
            <button style={{
              backgroundColor: "white",
              color: "#0a193d",
              fontWeight: "700", // Bold
              padding: "10px 60px",
              borderRadius: "50px",
              border: "none",
              fontSize: "18px",
              cursor: "pointer",
              boxShadow: "0 4px 6px rgba(0,0,0,0.1)",
              fontFamily: "inherit",
              letterSpacing: "-0.2px"
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