"use client";

import Link from "next/link";
import { usePathname } from "next/navigation";

export default function Navbar({ search, setSearch }) {
  const pathname = usePathname();

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
      
      {/* Logo */}
      <div>
        <Link href="/dashboard" style={{ 
          textDecoration: "none", 
          fontSize: "26px", 
          fontWeight: "800", 
          color: "#1a2b56"
        }}>
          LibrAspire
        </Link>
      </div>

      {/* SEARCH (cuma 1!) */}
      <div style={{ flex: "1", display: "flex", justifyContent: "center" }}>
        {pathname !== "/profile" && pathname !== "/contact" && (
          <input
            type="text"
            placeholder="Insert Book Title"
            value={search}
            onChange={(e) => setSearch(e.target.value)}
            style={{
              width: "100%",
              maxWidth: "450px",
              padding: "12px 25px",
              borderRadius: "50px",
              border: "none",
              backgroundColor: "#edf2f7",
              outline: "none",
              fontSize: "14px"
            }}
          />
        )}
      </div>

      {/* NAV */}
      <nav style={{ display: "flex", gap: "25px" }}>
        <Link href="/dashboard" style={navItemStyle("/dashboard")}>Home</Link>
        <Link href="/contact" style={navItemStyle("/contact")}>Contact</Link>
        <Link href="/profile" style={navItemStyle("/profile")}>Profile</Link>
      </nav>

    </header>
  );
}