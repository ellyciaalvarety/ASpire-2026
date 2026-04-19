"use client";

import Link from "next/link";
import { usePathname } from "next/navigation";

export default function Navbar() {
  const pathname = usePathname();

  // Gaya untuk item navigasi
  const navItemStyle = (path) => ({
    textDecoration: "none",
    fontSize: "16px",
    // Link akan otomatis menebal jika berada di halaman tersebut
    fontWeight: pathname === path ? "bold" : "500",
    color: pathname === path ? "#0d2861" : "#888",
    padding: "5px 10px",
    transition: "all 0.2s ease"
  });

  return (
    <header style={{
      backgroundColor: "white",
      height: "80px",
      padding: "0 60px",
      display: "flex",
      alignItems: "center",
      justifyContent: "space-between",
      boxShadow: "0 2px 15px rgba(0,0,0,0.03)",
      position: "sticky",
      top: 0,
      zIndex: 1000,
      width: "100%",
      boxSizing: "border-box"
    }}>
      
      {/* 1. Logo LibrAspire */}
      <div style={{ flex: "0 0 auto" }}>
        <Link href="/dashboard" style={{ 
          textDecoration: "none", 
          fontSize: "26px", 
          fontWeight: "800", 
          color: "#1a2b56"
        }}>
          LibrAspire
        </Link>
      </div>

      {/* 2. Kolom Pencarian (Tengah) */}
      <div style={{ flex: "1", display: "flex", justifyContent: "center", padding: "0 50px" }}>
        <div style={{ position: "relative", width: "100%", maxWidth: "450px" }}>
          <input 
            type="text" 
            placeholder="Insert Book Title" 
            style={{
              width: "100%",
              padding: "12px 25px",
              borderRadius: "50px",
              border: "none",
              backgroundColor: "#edf2f7",
              outline: "none",
              fontSize: "14px"
            }}
          />
        </div>
      </div>

      {/* 3. Menu Navigasi (Kanan) */}
      <nav style={{ display: "flex", gap: "25px", alignItems: "center" }}>
        {/* Link ke Dashboard/Home */}
        <Link href="/dashboard" style={navItemStyle("/dashboard")}>
          Home
        </Link>

        {/* Link ke Halaman Contact */}
        <Link href="/contact" style={navItemStyle("/contact")}>
          Contact
        </Link>

        {/* LINK PROFILE - Ini yang Anda butuhkan */}
        <Link href="/profile" style={navItemStyle("/profile")}>
          Profile
        </Link>
      </nav>

    </header>
  );
}