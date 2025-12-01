"use client"

import { useState, useMemo } from "react"
import { Search, ChevronUp, ChevronDown, Eye } from "lucide-react"

const studentData = [
  {
    id: 1,
    name: "Alex Johnson",
    nisn: "0012345001",
    class: "10-A",
    major: "Science",
    academicYear: "2024/2025",
    status: "Active",
    avatar: "AJ",
  },
  {
    id: 2,
    name: "Maria Garcia",
    nisn: "0012345002",
    class: "10-B",
    major: "English",
    academicYear: "2024/2025",
    status: "Active",
    avatar: "MG",
  },
  {
    id: 3,
    name: "James Wilson",
    nisn: "0012345003",
    class: "11-A",
    major: "Math",
    academicYear: "2024/2025",
    status: "Active",
    avatar: "JW",
  },
  {
    id: 4,
    name: "Emma Davis",
    nisn: "0012345004",
    class: "11-C",
    major: "Science",
    academicYear: "2024/2025",
    status: "Inactive",
    avatar: "ED",
  },
  {
    id: 5,
    name: "Oliver Brown",
    nisn: "0012345005",
    class: "12-A",
    major: "History",
    academicYear: "2024/2025",
    status: "Active",
    avatar: "OB",
  },
]

export default function StudentTable() {
  const [searchTerm, setSearchTerm] = useState("")
  const [sortConfig, setSortConfig] = useState({ key: "name", direction: "asc" })
  const [currentPage, setCurrentPage] = useState(1)

  const filteredData = useMemo(() => {
    return studentData.filter(
      (student) =>
        student.name.toLowerCase().includes(searchTerm.toLowerCase()) ||
        student.nisn.includes(searchTerm) ||
        student.class.toLowerCase().includes(searchTerm.toLowerCase()),
    )
  }, [searchTerm])

  const sortedData = useMemo(() => {
    const sorted = [...filteredData]
    sorted.sort((a, b) => {
      const aValue = a[sortConfig.key]
      const bValue = b[sortConfig.key]

      if (sortConfig.direction === "asc") {
        return aValue > bValue ? 1 : -1
      } else {
        return aValue < bValue ? 1 : -1
      }
    })
    return sorted
  }, [filteredData, sortConfig])

  const itemsPerPage = 5
  const totalPages = Math.ceil(sortedData.length / itemsPerPage)
  const startIndex = (currentPage - 1) * itemsPerPage
  const paginatedData = sortedData.slice(startIndex, startIndex + itemsPerPage)

  const handleSort = (key) => {
    setSortConfig({
      key,
      direction: sortConfig.key === key && sortConfig.direction === "asc" ? "desc" : "asc",
    })
  }

  const SortIcon = ({ column }) => {
    if (sortConfig.key !== column) return <div className="w-4 h-4" />
    return sortConfig.direction === "asc" ? (
      <ChevronUp size={16} className="text-primary" />
    ) : (
      <ChevronDown size={16} className="text-primary" />
    )
  }

  return (
    <div className="glass-card rounded-xl overflow-hidden">
      {/* Header */}
      <div className="p-6 border-b border-border/50">
        <div className="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
          <div>
            <h3 className="text-lg font-semibold">Latest Students</h3>
            <p className="text-sm text-muted-foreground mt-1">
              Showing {paginatedData.length} of {sortedData.length} students
            </p>
          </div>

          {/* Search */}
          <div className="relative">
            <Search size={18} className="absolute left-3 top-1/2 -translate-y-1/2 text-muted-foreground" />
            <input
              type="text"
              placeholder="Search by name, NISN, or class..."
              value={searchTerm}
              onChange={(e) => {
                setSearchTerm(e.target.value)
                setCurrentPage(1)
              }}
              className="pl-10 pr-4 py-2.5 bg-muted/30 border border-border/50 rounded-lg outline-none focus:border-primary/50 transition-colors text-sm"
            />
          </div>
        </div>
      </div>

      {/* Table */}
      <div className="overflow-x-auto">
        <table className="w-full">
          <thead className="border-b border-border/50 bg-muted/20">
            <tr>
              <th
                onClick={() => handleSort("name")}
                className="px-6 py-4 text-left text-sm font-semibold cursor-pointer hover:bg-muted/40 transition-colors flex items-center gap-2"
              >
                Name
                <SortIcon column="name" />
              </th>
              <th
                onClick={() => handleSort("nisn")}
                className="px-6 py-4 text-left text-sm font-semibold cursor-pointer hover:bg-muted/40 transition-colors flex items-center gap-2"
              >
                NISN
                <SortIcon column="nisn" />
              </th>
              <th
                onClick={() => handleSort("class")}
                className="px-6 py-4 text-left text-sm font-semibold cursor-pointer hover:bg-muted/40 transition-colors flex items-center gap-2"
              >
                Class
                <SortIcon column="class" />
              </th>
              <th className="px-6 py-4 text-left text-sm font-semibold">Major</th>
              <th className="px-6 py-4 text-left text-sm font-semibold">Academic Year</th>
              <th className="px-6 py-4 text-left text-sm font-semibold">Status</th>
              <th className="px-6 py-4 text-left text-sm font-semibold">Action</th>
            </tr>
          </thead>
          <tbody>
            {paginatedData.map((student) => (
              <tr key={student.id} className="border-b border-border/30 hover:bg-muted/20 transition-colors">
                <td className="px-6 py-4">
                  <div className="flex items-center gap-3">
                    <div className="w-9 h-9 rounded-lg bg-gradient-to-br from-primary to-secondary flex items-center justify-center">
                      <span className="text-white text-xs font-bold">{student.avatar}</span>
                    </div>
                    <span className="text-sm font-medium">{student.name}</span>
                  </div>
                </td>
                <td className="px-6 py-4 text-sm text-muted-foreground font-mono">{student.nisn}</td>
                <td className="px-6 py-4 text-sm">{student.class}</td>
                <td className="px-6 py-4 text-sm">{student.major}</td>
                <td className="px-6 py-4 text-sm">{student.academicYear}</td>
                <td className="px-6 py-4 text-sm">
                  <span
                    className={`px-3 py-1 rounded-full text-xs font-semibold ${
                      student.status === "Active"
                        ? "bg-emerald-500/20 text-emerald-400"
                        : "bg-destructive/20 text-destructive"
                    }`}
                  >
                    {student.status}
                  </span>
                </td>
                <td className="px-6 py-4">
                  <button className="p-2 hover:bg-muted/50 rounded-lg transition-colors">
                    <Eye size={16} className="text-muted-foreground hover:text-foreground" />
                  </button>
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>

      {/* Pagination */}
      <div className="px-6 py-4 border-t border-border/50 flex items-center justify-between">
        <div className="text-sm text-muted-foreground">
          Page {currentPage} of {totalPages}
        </div>
        <div className="flex gap-2">
          <button
            onClick={() => setCurrentPage(Math.max(1, currentPage - 1))}
            disabled={currentPage === 1}
            className="px-4 py-2 rounded-lg border border-border/50 text-sm font-medium hover:bg-muted/50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors"
          >
            Previous
          </button>
          <button
            onClick={() => setCurrentPage(Math.min(totalPages, currentPage + 1))}
            disabled={currentPage === totalPages}
            className="px-4 py-2 rounded-lg border border-border/50 text-sm font-medium hover:bg-muted/50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors"
          >
            Next
          </button>
        </div>
      </div>
    </div>
  )
}
