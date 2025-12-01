"use client"

import { useEffect, useState } from "react"
import { TrendingUp, BookOpen, Users, GraduationCap, Calendar } from "lucide-react"

const stats = [
  {
    id: "academic-year",
    title: "Active Academic Year",
    value: "2024/2025",
    icon: Calendar,
    color: "from-primary to-purple-600",
    accent: "#8b5cf6",
    trend: "+2.5%",
  },
  {
    id: "majors",
    title: "Total Majors",
    value: "12",
    icon: GraduationCap,
    color: "from-cyan-500 to-blue-600",
    accent: "#06b6d4",
    trend: "+1",
  },
  {
    id: "classes",
    title: "Total Classes",
    value: "48",
    icon: BookOpen,
    color: "from-emerald-500 to-green-600",
    accent: "#10b981",
    trend: "+4",
  },
  {
    id: "students",
    title: "Total Students",
    value: "1,247",
    icon: Users,
    color: "from-orange-500 to-red-600",
    accent: "#f59e0b",
    trend: "+156",
  },
]

function CountUp({ end, duration = 2 }) {
  const [count, setCount] = useState(0)

  useEffect(() => {
    const startValue = 0
    const endValue = end
    const steps = 60
    const stepDuration = (duration * 1000) / steps
    let currentStep = 0

    const interval = setInterval(() => {
      currentStep++
      const progress = currentStep / steps
      const currentValue = Math.floor(startValue + (endValue - startValue) * progress)
      setCount(currentValue)

      if (currentStep >= steps) {
        clearInterval(interval)
        setCount(endValue)
      }
    }, stepDuration)

    return () => clearInterval(interval)
  }, [end, duration])

  return count.toLocaleString()
}

export default function StatisticCards() {
  return (
    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      {stats.map((stat) => {
        const Icon = stat.icon
        const numericValue = stat.value.includes(",")
          ? Number.parseInt(stat.value.replace(",", ""))
          : Number.parseInt(stat.value.match(/\d+/)?.[0] || "0")

        return (
          <div key={stat.id} className="stat-card group relative overflow-hidden">
            {/* Animated Background Gradient */}
            <div
              className={`absolute inset-0 opacity-0 group-hover:opacity-10 transition-opacity duration-300 bg-gradient-to-br ${stat.color}`}
            ></div>

            <div className="relative z-10 flex flex-col">
              {/* Header */}
              <div className="flex items-start justify-between mb-6">
                <div>
                  <p className="text-sm text-muted-foreground font-medium">{stat.title}</p>
                </div>
                <div
                  className="p-3 rounded-lg bg-gradient-to-br opacity-80 group-hover:opacity-100 transition-opacity"
                  style={{
                    backgroundImage: `linear-gradient(135deg, ${stat.accent}20, ${stat.accent}40)`,
                  }}
                >
                  <Icon size={20} style={{ color: stat.accent }} className="icon-glow" />
                </div>
              </div>

              {/* Value */}
              <div className="flex items-end justify-between">
                <div>
                  <div className="text-3xl font-bold glow-text mb-2">
                    {typeof numericValue === "number" ? <CountUp end={numericValue} /> : stat.value}
                  </div>
                </div>
                <div className="flex items-center gap-1 text-xs font-semibold text-emerald-500">
                  <TrendingUp size={14} />
                  {stat.trend}
                </div>
              </div>
            </div>

            {/* Bottom Border Accent */}
            <div
              className="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r opacity-0 group-hover:opacity-100 transition-opacity duration-300"
              style={{
                backgroundImage: `linear-gradient(to right, ${stat.accent}, transparent)`,
              }}
            ></div>
          </div>
        )
      })}
    </div>
  )
}
