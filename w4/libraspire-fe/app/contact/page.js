"use client";
import Navbar from "../components/navbar";
import Footer from "../components/Footer";

export default function Contact() {
  return (
    <div style={{ minHeight: "100vh", display: "flex", flexDirection: "column" }}>
      <Navbar />
      <main style={{
        flex: 1, display: "flex", alignItems: "center", justifyContent: "center",
        backgroundImage: `linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://images.unsplash.com/photo-1521737711867-e3b97375f902?q=80&w=1974')`,
        backgroundSize: "cover", backgroundPosition: "center", padding: "20px"
      }}>
        <div style={{ backgroundColor: "#0a193d", width: "100%", maxWidth: "500px", padding: "50px", borderRadius: "35px", textAlign: "center" }}>
          <h2 style={{ color: "white", fontSize: "24px", fontWeight: "bold", marginBottom: "30px" }}>Contact Us</h2>
          <form style={{ display: "flex", flexDirection: "column", gap: "20px", textAlign: "left" }}>
            <div>
              <label style={{ color: "#ccc", fontSize: "14px", display: "block", marginBottom: "8px" }}>Subject</label>
              <input type="text" style={{ width: "100%", background: "transparent", border: "1px solid rgba(255,255,255,0.3)", borderRadius: "50px", padding: "10px 20px", color: "white", outline: "none" }} />
            </div>
            <div>
              <label style={{ color: "#ccc", fontSize: "14px", display: "block", marginBottom: "8px" }}>Message</label>
              <textarea rows="5" style={{ width: "100%", background: "transparent", border: "1px solid rgba(255,255,255,0.3)", borderRadius: "20px", padding: "15px 20px", color: "white", outline: "none", resize: "none" }}></textarea>
            </div>
            <div style={{ display: "flex", justifyContent: "flex-end" }}>
              <button style={{ backgroundColor: "white", color: "#0a193d", fontWeight: "bold", padding: "10px 35px", borderRadius: "10px", border: "none", cursor: "pointer" }}>Send</button>
            </div>
          </form>
        </div>
      </main>
      <Footer />
    </div>
  );
}