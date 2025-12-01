"use client"

import Sidebar from "./Sidebar"
import Navbar from "./Navbar"
import StatisticCards from "./StatisticCards"
import ChartsSection from "./ChartsSection"
import StudentTable from "./StudentTable"
import QuickActions from "./QuickActions"

export default function Dashboard() {
  return (
    <div className="flex h-screen bg-background overflow-hidden">
      {/* Sidebar */}
      <Sidebar />

      {/* Main Content */}
      <div className="flex-1 flex flex-col overflow-hidden ml-0 md:ml-0">
        {/* Navbar */}
        <Navbar />

        {/* Content Area */}
        <main className="flex-1 overflow-y-auto">
          <div className="p-6 md:p-8 space-y-8">
            {/* Header */}
            <div>
              <h1 className="text-3xl md:text-4xl font-bold glow-text mb-2">Dashboard</h1>
              <p className="text-muted-foreground">Welcome back! Here's your school performance overview.</p>
            </div>

            {/* Quick Actions */}
            <section>
              <h2 className="text-xl font-semibold mb-4">Quick Actions</h2>
              <QuickActions />
            </section>

            {/* Statistics */}
            <section>
              <h2 className="text-xl font-semibold mb-4">Overview</h2>
              <StatisticCards />
            </section>

            {/* Charts */}
            <section>
              <h2 className="text-xl font-semibold mb-4">Analytics</h2>
              <ChartsSection />
            </section>

            {/* Table */}
            <section>
              <StudentTable />
            </section>
          </div>
        </main>
      </div>
    </div>
  )
}
