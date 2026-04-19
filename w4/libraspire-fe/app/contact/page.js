"use client";
import Navbar from "../components/navbar";
import Footer from "../components/Footer";

export default function Contact() {
  return (
    <div style={{ 
      minHeight: "100vh", 
      display: "flex", 
      flexDirection: "column",
      fontFamily: "'Inter', sans-serif",
      WebkitFontSmoothing: "antialiased" 
    }}>
      <style jsx global>{`
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');
        
        /* Menghilangkan border default saat input di-klik agar tetap rapi */
        input:focus, textarea:focus {
          border-color: rgba(255,255,255,0.8) !important;
        }
      `}</style>

      <Navbar />
      
      <main style={{
        flex: 1, 
        display: "flex", 
        alignItems: "center", 
        justifyContent: "center",
        // Background overlay sedikit lebih gelap agar form lebih kontras
        backgroundImage: `linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1521737711867-e3b97375f902?q=80&w=1974')`,
        backgroundSize: "cover", 
        backgroundPosition: "center", 
        padding: "40px 20px"
      }}>
        
        <div style={{ 
          backgroundColor: "#051129", // Biru gelap yang lebih solid sesuai gambar
          width: "100%", 
          maxWidth: "520px", // Sedikit diperlebar agar proporsi box lebih mewah
          padding: "60px 50px", // Padding simetris
          borderRadius: "30px", 
          textAlign: "center",
          boxShadow: "0 25px 50px -12px rgba(0, 0, 0, 0.5)",
          border: "1px solid rgba(255,255,255,0.05)" // Border halus di tepi box
        }}>
          
          <h2 style={{ 
            color: "white", 
            fontSize: "32px", // Ukuran judul lebih besar
            fontWeight: "800", 
            marginBottom: "40px",
            letterSpacing: "-1px" 
          }}>Contact Us</h2>

          <form style={{ display: "flex", flexDirection: "column", gap: "25px", textAlign: "left" }}>
            
            {/* Field Subject */}
            <div style={{ display: "flex", flexDirection: "column", gap: "10px" }}>
              <label style={{ 
                color: "white", 
                fontSize: "15px", 
                fontWeight: "500", 
                marginLeft: "5px",
                opacity: 0.9
              }}>Subject</label>
              <input type="text" style={{ 
                width: "100%", 
                background: "rgba(255,255,255,0.03)", // Sedikit hint warna pada background input
                border: "1px solid rgba(255,255,255,0.3)", // Border lebih tipis dan bersih
                borderRadius: "12px", // Radius boxy-modern sesuai gambar
                padding: "14px 20px", 
                color: "white", 
                outline: "none",
                fontSize: "15px",
                fontFamily: "inherit",
                transition: "all 0.3s ease",
                boxSizing: "border-box"
              }} />
            </div>

            {/* Field Message */}
            <div style={{ display: "flex", flexDirection: "column", gap: "10px" }}>
              <label style={{ 
                color: "white", 
                fontSize: "15px", 
                fontWeight: "500", 
                marginLeft: "5px",
                opacity: 0.9
              }}>Message</label>
              <textarea rows="5" style={{ 
                width: "100%", 
                background: "rgba(255,255,255,0.03)", 
                border: "1px solid rgba(255,255,255,0.3)", 
                borderRadius: "15px", 
                padding: "18px 20px", 
                color: "white", 
                outline: "none", 
                resize: "none",
                fontSize: "15px",
                fontFamily: "inherit",
                transition: "all 0.3s ease",
                boxSizing: "border-box"
              }}></textarea>
            </div>

            {/* Button Container */}
            <div style={{ display: "flex", justifyContent: "center", marginTop: "15px" }}>
              <button style={{ 
                backgroundColor: "white", 
                color: "#051129", 
                fontWeight: "700", 
                padding: "12px 0", 
                width: "160px", // Ukuran tombol fixed agar rapi
                borderRadius: "50px", 
                border: "none", 
                cursor: "pointer",
                fontSize: "16px",
                fontFamily: "inherit",
                boxShadow: "0 10px 15px -3px rgba(0,0,0,0.1)",
                transition: "transform 0.2s ease, background-color 0.2s ease"
              }}
              onMouseOver={(e) => e.target.style.backgroundColor = "#f0f0f0"}
              onMouseOut={(e) => e.target.style.backgroundColor = "white"}
              >
                Send
              </button>
            </div>
          </form>
        </div>
      </main>
      
      <Footer />
    </div>
  );
}