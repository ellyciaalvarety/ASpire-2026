"use client";

import Link from "next/link";
import { usePathname } from "next/navigation";

export default function Navbar() {
  const pathname = usePathname();

  // Gaya untuk item navigasi
  const navItemStyle = (path) => ({
    textDecoration: "none",
    fontSize: "16px",
    fontFamily: "'Inter', sans-serif",
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
          color: "#1a2b56",
          fontFamily: "'Inter', sans-serif"
        }}>
          LibrAspire
        </Link>
      </div>

      {/* 2. Kolom Pencarian - HILANG DI PROFILE & CONTACT */}
      <div style={{ flex: "1", display: "flex", justifyContent: "center", padding: "0 50px" }}>
        {pathname !== "/profile" && pathname !== "/contact" && (
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
                fontSize: "14px",
                fontFamily: "'Inter', sans-serif"
              }}
            />
          </div>
        )}
      </div>

      {/* 3. Menu Navigasi */}
      <nav style={{ display: "flex", gap: "25px", alignItems: "center" }}>
        <Link href="/dashboard" style={navItemStyle("/dashboard")}>Home</Link>
        <Link href="/contact" style={navItemStyle("/contact")}>Contact</Link>
        <Link href="/profile" style={navItemStyle("/profile")}>Profile</Link>
      </nav>

    </header>
  );
}